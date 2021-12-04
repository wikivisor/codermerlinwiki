<?php

// Uncomment this to simplify URL (webserver configuration may be needed if fails)
# $wgArticlePath = '/wiki/$1';

// Allow CSS
$wgAllowSiteCSSOnRestrictedPages = true;
$wgRestrictDisplayTitle = false;

// We want logo to be defined here along with other branding settings
$wgLogos = [ '1x' => "$wgResourceBasePath/resources/assets/MerlinRoundIcon.png" ];

// Skin
wfLoadSkin( 'chameleon' );
$wgDefaultSkin = 'chameleon';
$wgBootswatchTheme = 'united';
$egChameleonThemeFile = __DIR__ . '/skins/chameleon/bootswatch/' . $wgBootswatchTheme . '/_variables.scss';
$egChameleonLayoutFile= __DIR__ . '/skins/chameleon/layouts/custom.xml';
$egChameleonExternalStyleModules = [
        __DIR__ . '/skins/chameleon/bootswatch/' . $wgBootswatchTheme . '/_bootswatch.scss' => 'afterMain',
        __DIR__ . '/skins/chameleon/custom.scss' => 'afterMain',
];
$egChameleonExternalStyleVariables = [
        'cmln-link-formats' => "(new: ('color': #ff0000, 'hover-color': #0000ff), external: #36b none #37c none)"
];
$egChameleonEnableExternalLinkIcons = true;
# $egScssCacheType = CACHE_NONE;

// Additional extensions
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'SemanticResultFormats' );
wfLoadExtension( 'TreeAndMenu' );

// Allow string functions
$wgPFEnableStringFunctions = true;

// Newsletter link in the footer
$wgHooks['SkinTemplateOutputPageBeforeExec'][] = function( $skin, &$template ) {
        $newsletterLink = Html::element( 'a', [ 'href' => $skin->msg( 'newsletter-url' )->escaped() ],
                $skin->msg( 'newsletter-label' )->text() );
        $template->set( 'newsletter', $newsletterLink );
        $template->data['footerlinks']['places'][] = 'newsletter';
        return true;
};

// Add a class for anonymous
$wgHooks['OutputPageBodyAttributes'][] = function ( OutputPage $out, Skin $skin, &$bodyAttrs ) {
   if ( $out->getUser()->isAnon() ) {
      $default = $bodyAttrs['class'];
      $bodyAttrs['class'] = $default . ' notloggedin'; // Note the leading space character.
   }
};
