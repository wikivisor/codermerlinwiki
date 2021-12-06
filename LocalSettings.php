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
        'cmln-link-formats' => "(new: ('color': #ff0000, 'hover-color': #0000ff), external: #7063a7 none #4f3f8a none)"
];
$egChameleonEnableExternalLinkIcons = true;
# $egScssCacheType = CACHE_NONE;

// Additional extensions
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'SemanticResultFormats' );
wfLoadExtension( 'TreeAndMenu' );
wfLoadExtension( 'Variables' );

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

// Add classes to the body tag
$wgHooks['OutputPageBodyAttributes'][] = function ( OutputPage $out, Skin $skin, &$bodyAttrs ) {
   $default = $bodyAttrs['class'];
   if ( $out->getUser()->getOption('gadget-Dark-theme') ){
      $bodyAttrs['class'] = $default . ' dark-theme';
   }
   if ( $out->getUser()->isAnon() ) {
      $bodyAttrs['class'] = $default . ' notloggedin';
   }
};

// TwitterFeed
$wgHooks['BeforePageDisplay'][] = function( OutputPage &$out, Skin &$skin ) {
     $code = <<<'START_END_MARKER'
<!-- Twitter Feed -->
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
START_END_MARKER;
     $out->addHeadItem( 'head-tags-load', $code );
};

