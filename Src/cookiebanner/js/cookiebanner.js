
(function ($, Drupal, drupalSettings) {

  $(document).ready(function() {

    /* Append cookiebanner */

    var markup = drupalSettings.cookiebanner.markup;
    
    $(markup).appendTo('body');

    /* Get All Cookies */

    var cookies = {};

    /* Display button to open banner */

    $(".cookie-banner-info-hidden").hide();

    $(".cookie-banner-popup").hide();

    /* Etat pour recharger la page si les scripts dans les block doivent être chargés après revalidation des choix */

    var reloadstate = false;

    /* Apparition du bouton pour ouvrir la bannière */

    var clienty = 0;
    
    $(function(){
      document.addEventListener('mousemove', evt => {
        clienty = evt.clientY;
        if(clienty> innerHeight - 30) {
          $(".cookie-banner-info-hidden").show();
          $(".cookie-banner-info-hidden").css("bottom", "0px");
        }
        else {
          $(".cookie-banner-info-hidden").hide();
        }
      });
    });

    /* Open banner */

    $(".cookie-banner-info-hidden").click(function() {
      $(".cookie-banner-popup").show();
      $(".cookie-banner-popup").css("bottom", "0px");
    });

    /* Close banner */
    
    $(".cookie-banner-info").click(function() {
      $(".cookie-banner-popup").hide();
    });

    /* Changer l'apparition progressive de l'avertissement RGPD */

    var consentcookie1 = false;
    var consentcookie2 = false;
    var consentcookie3 = false;
    var consentcookie4 = false;
    var consentcookie5 = false;
    var consentcookie6 = false;
    var consentcookie7 = false;
    var consentcookie8 = false;
    var consentcookie9 = false;
    var consentcookie10 = false;

    /* Bloquer les cookies en fonction des choix */

    var data = '';
    var dateconsent = '';
    var sixmonths = '';
    var dateelapse = '';

    if (!checkConsents()) {
      forceBanner();
    }

    function checkConsents() {
      
      // Get saved data from localStorage to get consent information
      data = JSON.parse(localStorage.getItem('rgpd'));
      
      if (data == null) {
        return false;
      }

      // Si le BO a changé
      var changedbo = parseInt(drupalSettings.cookiebanner.current_timestamp) >= parseInt(data.date) / 1000;
      if (changedbo) {
        localStorage.removeItem('rgpd');
        data = JSON.parse(null);
        return false;
      }

      dateconsent = parseInt(data.date);
      sixmonths = 1000 * 60 * 60 * 24 * 30 * 6;
      dateelapse = Date.now() - sixmonths;

      // Faire apparaitre l'avertissement RGPD
      if (data.consent !== 'true' | dateconsent < dateelapse) {
        $(".cookie-banner-popup").show();
        $(".cookie-banner-popup").css("bottom", "0px");
      }

      // Alimenter le consentement quand tout refuser
      consentcookie1 = data.consentcookie1;
      consentcookie2 = data.consentcookie2;
      consentcookie3 = data.consentcookie3;
      consentcookie4 = data.consentcookie4;
      consentcookie5 = data.consentcookie5;
      consentcookie6 = data.consentcookie6;
      consentcookie7 = data.consentcookie7;
      consentcookie8 = data.consentcookie8;
      consentcookie9 = data.consentcookie9;
      consentcookie10 = data.consentcookie10;

      /* Re-check les choix en fonction des derniers choix */

      if(data.consentcookie1 == true){
        $('.cookie-banner-cookie1 input').prop("checked", true);
        consentcookie1 = true;
      }
      else if (!drupalSettings.cookiebanner.cookiecheck1) {
          $('.cookie-banner-cookie1 input').prop("checked", false);
          consentcookie1 = false;
      }

      if(data.consentcookie2 == true){
        $('.cookie-banner-cookie2 input').prop("checked", true);
        consentcookie2 = true;
      }
      else if (!drupalSettings.cookiebanner.cookiecheck2) {
          $('.cookie-banner-cookie2 input').prop("checked", false);
          consentcookie2 = false;
      }

      if(data.consentcookie3 == true){
        $('.cookie-banner-cookie3 input').prop("checked", true);
        consentcookie3 = true;
      }
      else if (!drupalSettings.cookiebanner.cookiecheck3) {
          $('.cookie-banner-cookie3 input').prop("checked", false);
          consentcookie3 = false;
      }

      if(data.consentcookie4 == true){
        $('.cookie-banner-cookie4 input').prop("checked", true);
        consentcookie4 = true;
      }
      else if (!drupalSettings.cookiebanner.cookiecheck4) {
          $('.cookie-banner-cookie4 input').prop("checked", false);
          consentcookie4 = false;
      }

      if(data.consentcookie5 == true){
        $('.cookie-banner-cookie5 input').prop("checked", true);
        consentcookie5 = true;
      }
      else if (!drupalSettings.cookiebanner.cookiecheck5) {
          $('.cookie-banner-cookie5 input').prop("checked", false);
          consentcookie5 = false;
      }

      if(data.consentcookie6 == true){
        $('.cookie-banner-cookie6 input').prop("checked", true);
        consentcookie6 = true;
      }
      else if (!drupalSettings.cookiebanner.cookiecheck6) {
          $('.cookie-banner-cookie6 input').prop("checked", false);
          consentcookie6 = false;
      }

      if(data.consentcookie7 == true){
        $('.cookie-banner-cookie7 input').prop("checked", true);
        consentcookie7 = true;
      }
      else if (!drupalSettings.cookiebanner.cookiecheck7) {
          $('.cookie-banner-cookie7 input').prop("checked", false);
          consentcookie7 = false;
      }

      if(data.consentcookie8 == true){
        $('.cookie-banner-cookie8 input').prop("checked", true);
        consentcookie8 = true;
      }
      else if (!drupalSettings.cookiebanner.cookiecheck8) {
          $('.cookie-banner-cookie8 input').prop("checked", false);
          consentcookie8 = false;
      }

      if(data.consentcookie9 == true){
        $('.cookie-banner-cookie9 input').prop("checked", true);
        consentcookie9 = true;
      }
      else if (!drupalSettings.cookiebanner.cookiecheck9) {
          $('.cookie-banner-cookie9 input').prop("checked", false);
          consentcookie9 = false;
      }

      if(data.consentcookie10 == true){
        $('.cookie-banner-cookie10 input').prop("checked", true);
        consentcookie10 = true;
      }
      else if (!drupalSettings.cookiebanner.cookiecheck10) {
          $('.cookie-banner-cookie10 input').prop("checked", false);
          consentcookie10 = false;
      }
    
      // Get All Cookies
      getPageCookies();

      // Si tout refusé
      if (!consentcookie1 & !consentcookie2 & !consentcookie3 & !consentcookie4 & !consentcookie5 & !consentcookie6 & !consentcookie7 & !consentcookie8 & !consentcookie9 & !consentcookie10) {
        setTimeout(blockAllCookies, 1000);
      }
      else {
        setTimeout(blockCookies, 1000);
        setTimeout(blockCookies, 2000);
      }

      return true;
    }

    function forceBanner() {

      /* Si il n'y a jamais eu de validation des choix */

      $(".cookie-banner-popup").show();
      $(".cookie-banner-popup").css("bottom", "0px");

      // Tout déchecker par défaut sauf si obligatoire
      if (drupalSettings.cookiebanner.cookiecheck1) {
        $('.cookie-banner-cookie1 input').prop("checked", true);
      }
      else {
        $('.cookie-banner-cookie1 input').prop("checked", false);
      }
      if (drupalSettings.cookiebanner.cookiecheck2) {
        $('.cookie-banner-cookie2 input').prop("checked", true);
      }
      else {
        $('.cookie-banner-cookie2 input').prop("checked", false);
      }
      if (drupalSettings.cookiebanner.cookiecheck3) {
        $('.cookie-banner-cookie3 input').prop("checked", true);
      }
      else {
        $('.cookie-banner-cookie3 input').prop("checked", false);
      }
      if (drupalSettings.cookiebanner.cookiecheck4) {
        $('.cookie-banner-cookie4 input').prop("checked", true);
      }
      else {
        $('.cookie-banner-cookie4 input').prop("checked", false);
      }
      if (drupalSettings.cookiebanner.cookiecheck5) {
        $('.cookie-banner-cookie5 input').prop("checked", true);
      }
      else {
        $('.cookie-banner-cookie5 input').prop("checked", false);
      }
      if (drupalSettings.cookiebanner.cookiecheck6) {
        $('.cookie-banner-cookie6 input').prop("checked", true);
      }
      else {
        $('.cookie-banner-cookie6 input').prop("checked", false);
      }
      if (drupalSettings.cookiebanner.cookiecheck7) {
        $('.cookie-banner-cookie7 input').prop("checked", true);
      }
      else {
        $('.cookie-banner-cookie7 input').prop("checked", false);
      }
      if (drupalSettings.cookiebanner.cookiecheck8) {
        $('.cookie-banner-cookie8 input').prop("checked", true);
      }
      else {
        $('.cookie-banner-cookie8 input').prop("checked", false);
      }
      if (drupalSettings.cookiebanner.cookiecheck9) {
        $('.cookie-banner-cookie9 input').prop("checked", true);
      }
      else {
        $('.cookie-banner-cookie9 input').prop("checked", false);
      }
      if (drupalSettings.cookiebanner.cookiecheck10) {
        $('.cookie-banner-cookie10 input').prop("checked", true);
      }
      else {
        $('.cookie-banner-cookie10 input').prop("checked", false);
      }

      consentcookie1 = false;
      consentcookie2 = false;
      consentcookie3 = false;
      consentcookie4 = false;
      consentcookie5 = false;
      consentcookie6 = false;
      consentcookie7 = false;
      consentcookie8 = false;
      consentcookie9 = false;
      consentcookie10 = false;
    
      // Get All Cookies
      getPageCookies();
    
      // Bloquer tous les cookies
      setTimeout(blockAllCookies, 1000);

    }

    /* Re-Open banner */

    $(".cookie-banner-info").click(function() {
      if (data != null) {
        if (data.consent !== 'true' | dateconsent < dateelapse) {
          $(".cookie-banner-popup").show();
          $(".cookie-banner-popup").css("bottom", "0px");
        }
      }
      else {
        forceBanner();
      }
    });

    /* Faire disparaitre la bannière quand choix des cookies */

    $(".cookie-banner-save").click(function() {

      consentcookie1 = $('.cookie-banner-cookie1 input').prop("checked");
      consentcookie2 = $('.cookie-banner-cookie2 input').prop("checked");;
      consentcookie3 = $('.cookie-banner-cookie3 input').prop("checked");;
      consentcookie4 = $('.cookie-banner-cookie4 input').prop("checked");;
      consentcookie5 = $('.cookie-banner-cookie5 input').prop("checked");;
      consentcookie6 = $('.cookie-banner-cookie6 input').prop("checked");;
      consentcookie7 = $('.cookie-banner-cookie7 input').prop("checked");;
      consentcookie8 = $('.cookie-banner-cookie8 input').prop("checked");;
      consentcookie9 = $('.cookie-banner-cookie9 input').prop("checked");;
      consentcookie10 = $('.cookie-banner-cookie10 input').prop("checked");;

      hideCookieBanner();

    });

    /* Faire disparaitre la bannière quand accepte tous les cookies */

    $(".cookie-banner-accept-all").click(function() {
      
      consentcookie1 = true;
      consentcookie2 = true;
      consentcookie3 = true;
      consentcookie4 = true;
      consentcookie5 = true;
      consentcookie6 = true;
      consentcookie7 = true;
      consentcookie8 = true;
      consentcookie9 = true;
      consentcookie10 = true;

      $('.cookie-banner-cookie1 input').prop("checked", true);
      $('.cookie-banner-cookie2 input').prop("checked", true);
      $('.cookie-banner-cookie3 input').prop("checked", true);
      $('.cookie-banner-cookie4 input').prop("checked", true);
      $('.cookie-banner-cookie5 input').prop("checked", true);
      $('.cookie-banner-cookie6 input').prop("checked", true);
      $('.cookie-banner-cookie7 input').prop("checked", true);
      $('.cookie-banner-cookie8 input').prop("checked", true);
      $('.cookie-banner-cookie9 input').prop("checked", true);
      $('.cookie-banner-cookie10 input').prop("checked", true);

      hideCookieBanner();

    });

    /* Faire disparaitre la bannière quand accepte tous les cookies */

    $(".cookie-banner-deny-all").click(function() {
      
      if (!drupalSettings.cookiebanner.cookiecheck1)  {
        consentcookie1 = false;
        $('.cookie-banner-cookie1 input').prop("checked", false);
      }
      else {
        consentcookie1 = true;
        $('.cookie-banner-cookie1 input').prop("checked", true);
      }
      if (!drupalSettings.cookiebanner.cookiecheck2)  {
        consentcookie2 = false;
        $('.cookie-banner-cookie2 input').prop("checked", false);
      }
      else {
        consentcookie2 = true;
        $('.cookie-banner-cookie2 input').prop("checked", true);
      }
      if (!drupalSettings.cookiebanner.cookiecheck3)  {
        consentcookie3 = false;
        $('.cookie-banner-cookie3 input').prop("checked", false);
      }
      else {
        consentcookie3 = true;
        $('.cookie-banner-cookie3 input').prop("checked", true);
      }
      if (!drupalSettings.cookiebanner.cookiecheck4)  {
        consentcookie4 = false;
        $('.cookie-banner-cookie4 input').prop("checked", false);
      }
      else {
        consentcookie4 = true;
        $('.cookie-banner-cookie4 input').prop("checked", true);
      }
      if (!drupalSettings.cookiebanner.cookiecheck5)  {
        consentcookie5 = false;
        $('.cookie-banner-cookie5 input').prop("checked", false);
      }
      else {
        consentcookie5 = true;
        $('.cookie-banner-cookie5 input').prop("checked", true);
      }
      if (!drupalSettings.cookiebanner.cookiecheck6)  {
        consentcookie6 = false;
        $('.cookie-banner-cookie6 input').prop("checked", false);
      }
      else {
        consentcookie6 = true;
        $('.cookie-banner-cookie6 input').prop("checked", true);
      }
      if (!drupalSettings.cookiebanner.cookiecheck7)  {
        consentcookie7 = false;
        $('.cookie-banner-cookie7 input').prop("checked", false);
      }
      else {
        consentcookie7 = true;
        $('.cookie-banner-cookie7 input').prop("checked", true);
      }
      if (!drupalSettings.cookiebanner.cookiecheck8)  {
        consentcookie8 = false;
        $('.cookie-banner-cookie8 input').prop("checked", false);
      }
      else {
        consentcookie8 = true;
        $('.cookie-banner-cookie8 input').prop("checked", true);
      }
      if (!drupalSettings.cookiebanner.cookiecheck9)  {
        consentcookie9 = false;
        $('.cookie-banner-cookie9 input').prop("checked", false);
      }
      else {
        consentcookie9 = true;
        $('.cookie-banner-cookie9 input').prop("checked", true);
      }
      if (!drupalSettings.cookiebanner.cookiecheck10)  {
        consentcookie10 = false;
        $('.cookie-banner-cookie10 input').prop("checked", false);
      }
      else {
        consentcookie10 = true;
        $('.cookie-banner-cookie10 input').prop("checked", true);
      }

      consentcookie1 = false;
      consentcookie2 = false;
      consentcookie3 = false;
      consentcookie4 = false;
      consentcookie5 = false;
      consentcookie6 = false;
      consentcookie7 = false;
      consentcookie8 = false;
      consentcookie9 = false;
      consentcookie10 = false;

      // Faire disparaitre l'avertissement RGPD
      $(".cookie-banner-popup").hide();

      // Archiver les choix
      archiverChoix();

      // Create data of consent
      data = { "consent" : "true", "date" : Date.now().toString(), "consentcookie1": consentcookie1, "consentcookie2": consentcookie2, "consentcookie3": consentcookie3, "consentcookie4": consentcookie4, "consentcookie5": consentcookie5, "consentcookie6": consentcookie6, "consentcookie7": consentcookie7, "consentcookie8": consentcookie8, "consentcookie9": consentcookie9, "consentcookie10": consentcookie10 }

      // Save data to localStorage
      localStorage.setItem('rgpd', JSON.stringify(data));
    
      // Get All Cookies
      getPageCookies();

      // Bloquer les cookies
      setTimeout(blockCookies, 1000);

      // Bloquer tous les cookies
      setTimeout(blockAllCookies, 2000);

      // Recharger la page car revalidation des scripts des blocks
      setTimeout(redirectingWithReloadState, 2000);

    });

    // Faire disparaitre la bannière et enregistrement du consentement
    function hideCookieBanner() {

      // Faire disparaitre l'avertissement RGPD
      $(".cookie-banner-popup").hide();
      
      // Archiver les choix
      archiverChoix();
      
      // Create data of consent
      data = { "consent" : "true", "date" : Date.now().toString(), "consentcookie1": consentcookie1, "consentcookie2": consentcookie2, "consentcookie3": consentcookie3, "consentcookie4": consentcookie4, "consentcookie5": consentcookie5, "consentcookie6": consentcookie6, "consentcookie7": consentcookie7, "consentcookie8": consentcookie8, "consentcookie9": consentcookie9, "consentcookie10": consentcookie10 }

      // Save data to localStorage
      localStorage.setItem('rgpd', JSON.stringify(data));
    
      // Get All Cookies
      getPageCookies();

      // Bloquer les cookies et les scripts
      setTimeout(blockCookies, 1000);
      setTimeout(blockCookies, 2000);

      // Recharger la page car revalidation des scripts des blocks
      setTimeout(redirectingWithReloadState, 2000);

    }

    function redirectingWithReloadState() {
      if (reloadstate & drupalSettings.cookiebanner.user != '') {
        window.location.href = drupalSettings.cookiebanner.lien_redirection;
        reloadstate = false;
      }
    }

    // Evénement lors du click du button toggle switch de remplacement de la checkbox pour les cookies nécessaires
    if (drupalSettings.cookiebanner.cookiecheck1) {
      $('.cookie-banner-cookie1 input').prop("checked", true);
      // Empecher de décocher les cookies si impossible
      $('.cookie-banner-cookie1 input').click(function(){
        if($(this).prop("checked") == false) {
            setTimeout(function(){
              $('.cookie-banner-cookie1 input').prop("checked", true);
            }, 350);
          }
      });
    }

    // Evénement lors du click du button toggle switch de remplacement de la checkbox pour les cookies nécessaires
    if (drupalSettings.cookiebanner.cookiecheck2) {
      $('.cookie-banner-cookie2 input').prop("checked", true);
      // Empecher de décocher les cookies si impossible
      $('.cookie-banner-cookie2 input').click(function(){
        if($(this).prop("checked") == false) {
            setTimeout(function(){
              $('.cookie-banner-cookie2 input').prop("checked", true);
            }, 350);
          }
      });
    }

    // Evénement lors du click du button toggle switch de remplacement de la checkbox pour les cookies nécessaires
    if (drupalSettings.cookiebanner.cookiecheck3) {
      $('.cookie-banner-cookie3 input').prop("checked", true);
      // Empecher de décocher les cookies si impossible
      $('.cookie-banner-cookie3 input').click(function(){
        if($(this).prop("checked") == false) {
            setTimeout(function(){
              $('.cookie-banner-cookie3 input').prop("checked", true);
            }, 350);
          }
      });
    }

    // Evénement lors du click du button toggle switch de remplacement de la checkbox pour les cookies nécessaires
    if (drupalSettings.cookiebanner.cookiecheck4) {
      $('.cookie-banner-cookie4 input').prop("checked", true);
      // Empecher de décocher les cookies si impossible
      $('.cookie-banner-cookie4 input').click(function(){
        if($(this).prop("checked") == false) {
            setTimeout(function(){
              $('.cookie-banner-cookie4 input').prop("checked", true);
            }, 350);
          }
      });
    }

    // Evénement lors du click du button toggle switch de remplacement de la checkbox pour les cookies nécessaires
    if (drupalSettings.cookiebanner.cookiecheck5) {
      $('.cookie-banner-cookie5 input').prop("checked", true);
      // Empecher de décocher les cookies si impossible
      $('.cookie-banner-cookie5 input').click(function(){
        if($(this).prop("checked") == false) {
            setTimeout(function(){
              $('.cookie-banner-cookie5 input').prop("checked", true);
            }, 350);
          }
      });
    }

    // Evénement lors du click du button toggle switch de remplacement de la checkbox pour les cookies nécessaires
    if (drupalSettings.cookiebanner.cookiecheck6) {
      $('.cookie-banner-cookie6 input').prop("checked", true);
      // Empecher de décocher les cookies si impossible
      $('.cookie-banner-cookie7 input').click(function(){
        if($(this).prop("checked") == false) {
            setTimeout(function(){
              $('.cookie-banner-cookie7 input').prop("checked", true);
            }, 350);
          }
      });
    }

    // Evénement lors du click du button toggle switch de remplacement de la checkbox pour les cookies nécessaires
    if (drupalSettings.cookiebanner.cookiecheck8) {
      $('.cookie-banner-cookie8 input').prop("checked", true);
      // Empecher de décocher les cookies si impossible
      $('.cookie-banner-cookie8 input').click(function(){
        if($(this).prop("checked") == false) {
            setTimeout(function(){
              $('.cookie-banner-cookie8 input').prop("checked", true);
            }, 350);
          }
      });
    }

    // Evénement lors du click du button toggle switch de remplacement de la checkbox pour les cookies nécessaires
    if (drupalSettings.cookiebanner.cookiecheck9) {
      $('.cookie-banner-cookie9 input').prop("checked", true);
      // Empecher de décocher les cookies si impossible
      $('.cookie-banner-cookie9 input').click(function(){
        if($(this).prop("checked") == false) {
            setTimeout(function(){
              $('.cookie-banner-cookie9 input').prop("checked", true);
            }, 350);
          }
      });
    }

    // Evénement lors du click du button toggle switch de remplacement de la checkbox pour les cookies nécessaires
    if (drupalSettings.cookiebanner.cookiecheck10) {
      $('.cookie-banner-cookie10 input').prop("checked", true);
      // Empecher de décocher les cookies si impossible
      $('.cookie-banner-cookie10 input').click(function(){
        if($(this).prop("checked") == false) {
            setTimeout(function(){
              $('.cookie-banner-cookie10 input').prop("checked", true);
            }, 350);
          }
      });
    }

    // Returns an object of key value pairs for this page's cookies
    function getPageCookies() {

      /* Get cookies with Javascript */

      // cookie is a string containing a semicolon-separated list, this split puts it into an array
      var cookieArr = document.cookie.split(";");

      // Iterate the array of flat cookies to get their key value pair
      for (var i = 0; i < cookieArr.length; i++) {

        // Remove the standardized whitespace
        var cookieSeg = cookieArr[i].trim();

        // Index of the split between key and value
        var firstEq = cookieSeg.indexOf("=");

        // Assignments
        var name = cookieSeg.substr(0,firstEq);
        var value = cookieSeg.substr(firstEq+1);
        cookies[name] = value;
        
      }

      /* Get cookies with PHP (HttpOnly) */

      jQuery.get({
        url: drupalSettings.cookiebanner.url_get,
        dataType: "json",
        beforeSend: function(x) {
          if (x && x.overrideMimeType) {
            x.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(result) {
          $.each(result, function(index, el) {
            cookies[index] = el; 
          });
          return result;
        },
        error: function(result) {
          return result;
        }
      });

    }

    // Block all cookies
    function blockAllCookies() {
      for (var cookie in cookies) {
        var value = cookies[cookie];
        setCookie(cookie, value, 0);
      }
    }

    // Block or allow cookies and scripts
    function blockCookies() {
      
      // Block or allow cookies

      for (var cookie in cookies) {

        var cookienames1 = drupalSettings.cookiebanner.cookiename1.split(" ");

        cookienames1.forEach(name => {
          if (cookie.includes(name)) {
            var value = cookies[cookie];
            if (consentcookie1) {
              setCookie(cookie, value, 180);
            }
            else {
              setCookie(cookie, value, 0);
            }
          }
        });

        var cookienames2 = drupalSettings.cookiebanner.cookiename2.split(" ");

        cookienames2.forEach(name => {
          if (cookie.includes(name)) {
            var value = cookies[cookie];
            if (consentcookie2) {
              setCookie(cookie, value, 180);
            }
            else {
              setCookie(cookie, value, 0);
            }
          }
        });

        var cookienames3 = drupalSettings.cookiebanner.cookiename3.split(" ");

        cookienames3.forEach(name => {
          if (cookie.includes(name)) {
            var value = cookies[cookie];
            if (consentcookie3) {
              setCookie(cookie, value, 180);
            }
            else {
              setCookie(cookie, value, 0);
            }
          }
        });

        var cookienames4 = drupalSettings.cookiebanner.cookiename4.split(" ");

        cookienames4.forEach(name => {
          if (cookie.includes(name)) {
            var value = cookies[cookie];
            if (consentcookie4) {
              setCookie(cookie, value, 180);
            }
            else {
              setCookie(cookie, value, 0);
            }
          }
        });

        var cookienames5 = drupalSettings.cookiebanner.cookiename5.split(" ");

        cookienames5.forEach(name => {
          if (cookie.includes(name)) {
            var value = cookies[cookie];
            if (consentcookie5) {
              setCookie(cookie, value, 180);
            }
            else {
              setCookie(cookie, value, 0);
            }
          }
        });

        var cookienames6 = drupalSettings.cookiebanner.cookiename6.split(" ");

        cookienames6.forEach(name => {
          if (cookie.includes(name)) {
            var value = cookies[cookie];
            if (consentcookie6) {
              setCookie(cookie, value, 180);
            }
            else {
              setCookie(cookie, value, 0);
            }
          }
        });

        var cookienames7 = drupalSettings.cookiebanner.cookiename7.split(" ");

        cookienames7.forEach(name => {
          if (cookie.includes(name)) {
            var value = cookies[cookie];
            if (consentcookie7) {
              setCookie(cookie, value, 180);
            }
            else {
              setCookie(cookie, value, 0);
            }
          }
        });

        var cookienames8 = drupalSettings.cookiebanner.cookiename8.split(" ");

        cookienames8.forEach(name => {
          if (cookie.includes(name)) {
            var value = cookies[cookie];
            if (consentcookie8) {
              setCookie(cookie, value, 180);
            }
            else {
              setCookie(cookie, value, 0);
            }
          }
        });

        var cookienames9 = drupalSettings.cookiebanner.cookiename9.split(" ");

        cookienames9.forEach(name => {
          if (cookie.includes(name)) {
            var value = cookies[cookie];
            if (consentcookie9) {
              setCookie(cookie, value, 180);
            }
            else {
              setCookie(cookie, value, 0);
            }
          }
        });

        var cookienames10 = drupalSettings.cookiebanner.cookiename10.split(" ");

        cookienames10.forEach(name => { 
          if (cookie.includes(name)) {
            var value = cookies[cookie];
            if (consentcookie10) {
              setCookie(cookie, value, 180);
            }
            else {
              setCookie(cookie, value, 0);
            }
          }
        });

      }

      // Block or allow scripts

      var cookiefct1 = drupalSettings.cookiebanner.cookiefct1.split(" ");

      cookiefct1.forEach(name => {
        try {
          if (consentcookie1) {
            window[name]();
          }
          else {
            window[name] = function(){};
            reloadstate = true;
          }
        }
        catch {}
      });

      var cookiefct2 = drupalSettings.cookiebanner.cookiefct2.split(" ");

      cookiefct2.forEach(name => {
        try {
          if (consentcookie2) {
            window[name]();
          }
          else {
            window[name] = function(){};
            reloadstate = true;
          }
        }
        catch {}
      });
      
      var cookiefct3 = drupalSettings.cookiebanner.cookiefct3.split(" ");

      cookiefct3.forEach(name => {
        try {
          if (consentcookie3) {
            window[name]();
          }
          else {
            window[name] = function(){};
            reloadstate = true;
          }
        }
        catch {}
      });
      
      var cookiefct4 = drupalSettings.cookiebanner.cookiefct4.split(" ");

      cookiefct4.forEach(name => {
        try {
          if (consentcookie4) {
            window[name]();
          }
          else {
            window[name] = function(){};
            reloadstate = true;
          }
        }
        catch {}
      });
      
      var cookiefct5 = drupalSettings.cookiebanner.cookiefct5.split(" ");

      cookiefct5.forEach(name => {
        try {
          if (consentcookie5) {
            window[name]();
          }
          else {
            window[name] = function(){};
            reloadstate = true;
          }
        }
        catch {}
      });
      
      var cookiefct6 = drupalSettings.cookiebanner.cookiefct6.split(" ");

      cookiefct6.forEach(name => {
        try {
          if (consentcookie6) {
            window[name]();
          }
          else {
            window[name] = function(){};
            reloadstate = true;
          }
        }
        catch {}
      });
      
      var cookiefct7 = drupalSettings.cookiebanner.cookiefct7.split(" ");

      cookiefct7.forEach(name => {
        try {
          if (consentcookie7) {
            window[name]();
          }
          else {
            window[name] = function(){};
            reloadstate = true;
          }
        }
        catch {}
      });
      
      var cookiefct8 = drupalSettings.cookiebanner.cookiefct8.split(" ");

      cookiefct8.forEach(name => {
        try {
          if (consentcookie8) {
            window[name]();
          }
          else {
            window[name] = function(){};
            reloadstate = true;
          }
        }
        catch {}
      });
      
      var cookiefct9 = drupalSettings.cookiebanner.cookiefct9.split(" ");

      cookiefct9.forEach(name => {
        try {
          if (consentcookie9) {
            window[name]();
          }
          else {
            window[name] = function(){};
            reloadstate = true;
          }
        }
        catch {}
      });
      
      var cookiefct10 = drupalSettings.cookiebanner.cookiefct10.split(" ");

      cookiefct10.forEach(name => {
        try {
          if (consentcookie10) {
            window[name]();
          }
          else {
            window[name] = function(){};
            reloadstate = true;
          }
        }
        catch {}
      });

    }

    // Set the expiration date
    function setCookie(cookiename, value, expirationdays) {

      if (cookiename !== null && value !== null && expirationdays !== null) {

        // With Javascript
        $.cookie(cookiename, value, { expires: expirationdays, path: '/' });
        
        // With PHP
        var days = expirationdays;
        var name = cookiename;
        var jsonObjects = { name: name, value: value, days: days };
        jQuery.ajax({
          url: drupalSettings.cookiebanner.url_unset,
          type: "POST",
          data: { cookies: JSON.stringify(jsonObjects) },
          dataType: "json",
          beforeSend: function(x) {
            if (x && x.overrideMimeType) {
              x.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(result) {
          },
          error: function(result) {
          }
        });

      }

    }

    /* Archiver les cookies */

    var cookie1 = drupalSettings.cookiebanner.cookiename1;
    var cookie2 = drupalSettings.cookiebanner.cookiename2;
    var cookie3 = drupalSettings.cookiebanner.cookiename3;
    var cookie4 = drupalSettings.cookiebanner.cookiename4;
    var cookie5 = drupalSettings.cookiebanner.cookiename5;
    var cookie6 = drupalSettings.cookiebanner.cookiename6;
    var cookie7 = drupalSettings.cookiebanner.cookiename7;
    var cookie8 = drupalSettings.cookiebanner.cookiename8;
    var cookie9 = drupalSettings.cookiebanner.cookiename9;
    var cookie10 = drupalSettings.cookiebanner.cookiename10;

    function archiverChoix() {

      var neverarchived = false;

      var chosechangedcookie1 = false;
      var chosechangedcookie2 = false;
      var chosechangedcookie3 = false;
      var chosechangedcookie4 = false;
      var chosechangedcookie5 = false;
      var chosechangedcookie6 = false;
      var chosechangedcookie7 = false;
      var chosechangedcookie8 = false;
      var chosechangedcookie9 = false;
      var chosechangedcookie10 = false;

      // Get saved data from localStorage to get consent information
      var data = JSON.parse(localStorage.getItem('rgpd'));

      /* Check if consent changed */
      if (data != null) {
        if (drupalSettings.cookiebanner.cookieactive1) {
          chosechangedcookie1 = data.consentcookie1 != consentcookie1 ? true : false;
        }
        else {
          chosechangedcookie1 = false;
        }

        if (drupalSettings.cookiebanner.cookieactive2) {
          chosechangedcookie2 = data.consentcookie2 != consentcookie2 ? true : false;
        }
        else {
          chosechangedcookie2 = false;
        }

        if (drupalSettings.cookiebanner.cookieactive3) {
          chosechangedcookie3 = data.consentcookie3 != consentcookie3 ? true : false;
        }
        else {
          chosechangedcookie3 = false;
        }

        if (drupalSettings.cookiebanner.cookieactive4) {
          chosechangedcookie4 = data.consentcookie4 != consentcookie4 ? true : false;
        }
        else {
          chosechangedcookie4 = false;
        }

        if (drupalSettings.cookiebanner.cookieactive5) {
          chosechangedcookie5 = data.consentcookie5 != consentcookie5 ? true : false;
        }
        else {
          chosechangedcookie5 = false;
        }

        if (drupalSettings.cookiebanner.cookieactive6) {
          chosechangedcookie6 = data.consentcookie6 != consentcookie6 ? true : false;
        }
        else {
          chosechangedcookie6 = false;
        }

        if (drupalSettings.cookiebanner.cookieactive7) {
          chosechangedcookie7 = data.consentcookie7 != consentcookie7 ? true : false;
        }
        else {
          chosechangedcookie7 = false;
        }

        if (drupalSettings.cookiebanner.cookieactive8) {
          chosechangedcookie8 = data.consentcookie8 != consentcookie8 ? true : false;
        }
        else {
          chosechangedcookie8 = false;
        }

        if (drupalSettings.cookiebanner.cookieactive9) {
          chosechangedcookie9 = data.consentcookie9 != consentcookie9 ? true : false;
        }
        else {
          chosechangedcookie9 = false;
        }

        if (drupalSettings.cookiebanner.cookieactive10) {
          chosechangedcookie10 = data.consentcookie10 != consentcookie10 ? true : false;
        }
        else {
          chosechangedcookie10 = false;
        }
      }
      else {
        neverarchived = true;
      }

      if (neverarchived | chosechangedcookie1 | chosechangedcookie2 | chosechangedcookie3 | chosechangedcookie4 | chosechangedcookie5 | chosechangedcookie6 | chosechangedcookie7 | chosechangedcookie8 | chosechangedcookie9 | chosechangedcookie10) {
        var jsonObjects = { date: Date.now().toString(), 1:{cookie:cookie1, consent: consentcookie1}, 2:{cookie:cookie2, consent: consentcookie2}, 3:{cookie:cookie3, consent: consentcookie3}, 4:{cookie:cookie4, consent: consentcookie4}, 5:{cookie:cookie5, consent: consentcookie5}, 6:{cookie:cookie6, consent: consentcookie6}, 7:{cookie:cookie7, consent: consentcookie7}, 8:{cookie:cookie8, consent: consentcookie8}, 9:{cookie:cookie9, consent: consentcookie9}, 10:{cookie:cookie10, consent: consentcookie10} };
        jQuery.ajax({
          url: drupalSettings.cookiebanner.url_archiver,
          type: "POST",
          data: { cookies: JSON.stringify(jsonObjects) },
          dataType: "json",
          beforeSend: function(x) {
            if (x && x.overrideMimeType) {
              x.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(result) {
          },
          error: function(result) {
          }
        });
      }
    }

    /* Block cookies when poping */
  
    //setInterval(blockAllPopingCookies, 2500);

    function blockAllPopingCookies() {
    
      // Get All Cookies
      getPageCookies();

      // Block all cookies
      if (!consentcookie1 & !consentcookie2 & !consentcookie3 & !consentcookie4 & !consentcookie5 & !consentcookie6 & !consentcookie7 & !consentcookie8 & !consentcookie9 & !consentcookie10) {
        setTimeout(blockAllCookies, 1000);
      }
    };

  });

})(jQuery, Drupal, drupalSettings);
