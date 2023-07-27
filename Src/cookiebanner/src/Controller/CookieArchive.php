<?php

/**
 * @file
 * Contains Drupal\cookiebanner\Controller\CookieArchive.
 */

namespace Drupal\cookiebanner\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Class CookieArchive.
 *
 * @package Drupal\cookiebanner\Controller
 */
class CookieArchive extends ControllerBase {

    public static function archiverConsentement(Request $request) {

        // Save user choices in BDD for cookie consent

        $json_string = $request->getContent();
        $decoded = \Drupal\Component\Serialization\Json::decode($json_string);
        
        $date = $decoded['date'];

        $cookie1 = $decoded[1]['cookie'];
        $consent1 = $decoded[1]['consent']->toString();
        $cookie2 = $decoded[2]['cookie'];
        $consent2 = $decoded[2]['consent']->toString();
        $cookie3 = $decoded[3]['cookie'];
        $consent3 = $decoded[3]['consent']->toString();
        $cookie4 = $decoded[4]['cookie'];
        $consent4 = $decoded[4]['consent']->toString();
        $cookie5 = $decoded[5]['cookie'];
        $consent5 = $decoded[5]['consent']->toString();
        $cookie6 = $decoded[6]['cookie'];
        $consent6 = $decoded[6]['consent']->toString();
        $cookie7 = $decoded[7]['cookie'];
        $consent7 = $decoded[7]['consent']->toString();
        $cookie8 = $decoded[8]['cookie'];
        $consent8 = $decoded[8]['consent']->toString();
        $cookie9 = $decoded[9]['cookie'];
        $consent9 = $decoded[9]['consent']->toString();
        $cookie10 = $decoded[10]['cookie'];
        $consent10 = $decoded[10]['consent']->toString();

        $clientIP = \Drupal::request()->getClientIp();

        $username = \Drupal::currentUser()->getAccountName();

        $conn = \Drupal::database();

        $conn->insert('cookiebanner')->fields(
            array(
                'username' => $username,
                'clientIP' => $clientIP,
                'date' => $date,
                'cookie1' => $cookie1,
                'consent1' => $consent1,
                'cookie2' => $cookie2,
                'consent2' => $consent2,
                'cookie3' => $cookie3,
                'consent3' => $consent3,
                'cookie4' => $cookie4,
                'consent4' => $consent4,
                'cookie5' => $cookie5,
                'consent5' => $consent5,
                'cookie6' => $cookie6,
                'consent6' => $consent6,
                'cookie7' => $cookie7,
                'consent7' => $consent7,
                'cookie8' => $cookie8,
                'consent8' => $consent8,
                'cookie9' => $cookie9,
                'consent9' => $consent9,
                'cookie10' => $cookie10,
                'consent10' => $consent10,
            )
        )->execute();

        // Delete user choices after 6 months

        $sixmonths = 1000 * 60 * 60 * 24 * 30 * 6;
        $datenow = new DrupalDateTime();
        $sixmonths_timestamp = $datenow->getTimestamp() * 1000 - $sixmonths;

        $conn->delete('cookiebanner')->condition('date', $sixmonths_timestamp, '<')->execute();
      
        return new JsonResponse($date);

    }
}