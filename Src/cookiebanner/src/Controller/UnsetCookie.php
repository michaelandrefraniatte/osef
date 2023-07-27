<?php

/**
 * @file
 * Contains Drupal\cookiebanner\Controller\UnsetCookie.
 */

namespace Drupal\cookiebanner\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Class UnsetCookie.
 *
 * @package Drupal\cookiebanner\Controller
 */
class UnsetCookie extends ControllerBase {

    public static function getCookies(Request $request) {

        foreach ($_COOKIE as $key => $val) {
            $cookie[$key] = $val;
        }
        
        if (isset($cookie)) {
            return new JsonResponse($cookie);
        }

        return new JsonResponse('error');
    }

    public static function unsetCookie(Request $request) {

        $json_string = $request->getContent();
        $decoded = \Drupal\Component\Serialization\Json::decode($json_string);
        
        if (isset($decoded['name']) & isset($decoded['value']) & isset($decoded['days'])) {

            $name = $decoded['name'];
            $value = $decoded['value'];
            $days = $decoded['days'];

            $time = time() - 10 + $days * 24 * 60 * 60;

            setcookie($name, $value, $time);
            setcookie($name, $value, $time, "/");

            return new JsonResponse($time);
        }

        return new JsonResponse('error');

    }
}