<?php
/**
 * Created by PhpStorm.
 * User: tcordier
 * Date: 15/06/14
 * Time: 12:58
 */

namespace Numscale\Bundle\CoreBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;


class LanguageListener {

    private $supportedLocales;
    private $defaultLocale;

    public function __construct($defaultLocale = 'en', $supportedLocales = array("en"))
    {
        $this->defaultLocale = $defaultLocale;
        $this->supportedLocales = $supportedLocales;
    }


    public function onKernelRequest(GetResponseEvent $event)
    {

        $request = $event->getRequest();

        if (!$request->hasPreviousSession()) {
            if($request->getRequestUri() == "/") {
                if(is_null($request->getSession()->get('_locale'))) {
                    $preferredLanguage = $request->getPreferredLanguage($this->supportedLocales);
                    $request->setLocale($preferredLanguage);
                    $event->setResponse(new RedirectResponse($preferredLanguage . "/"));
                }
            }
        }

        if ($locale = $request->attributes->get('_locale')) {
            $request->getSession()->set('_locale', $locale);
        } else {
            // if no explicit locale has been set on this request, use one from the session
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }

        if($request->getRequestUri() == "/") {
            $event->setResponse(new RedirectResponse($request->getSession()->get('_locale', $this->defaultLocale)));
        }




    }

    public static function getSubscribedEvents()
    {
        return array(
            // must be registered before the default Locale listener
            KernelEvents::REQUEST => array(array('onKernelRequest', 17)),
        );
    }
} 