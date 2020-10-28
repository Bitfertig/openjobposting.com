<?php

/**
 * SchemaJobposting
 * @author Aurelian Hermand, 2019
 */

/*
Googles Testing-Tool: https://search.google.com/structured-data/testing-tool

Example Usage:
$sjp = new SchemaJobposting();
$sjp->set('datePosted', '');
$sjp->set('validThrough', date('Y-m-d', strtotime('+1 year')));
$sjp->set('title', '');
$sjp->set('description', '');
$sjp->set('employmentType', []); // FULL_TIME, PART_TIME, contract, temporary, seasonal, internship
$sjp->set('hiringOrganization.name', '');
$sjp->set('hiringOrganization.sameAs', '');
$sjp->set('hiringOrganization.logo', '');
$sjp->set('jobLocation.address.streetAddress', '');
$sjp->set('jobLocation.address.addressLocality', '');
$sjp->set('jobLocation.address.postalCode', '');
$sjp->set('jobLocation.address.addressRegion', ''); // adressRegion (Land-Bundesland als ISO 3166-2 Code) https://de.wikipedia.org/wiki/ISO_3166-2
$sjp->set('jobLocation.address.addressCountry', '');
$sjp->set('baseSalary.currency', 'EUR');
$sjp->set('baseSalary.value', 'nach Vereinbarung / Qualifikation');
//echo '<pre><mark>|'.$sjp->toJson();echo '|</mark></pre>';
echo $sjp->toScript();
*/

class SchemaJobposting {

    // Allgemein
    public $sjp = [
        '@context' => 'https://schema.org/',
        '@type' => 'JobPosting',
        'datePosted' => '',
        'validThrough' => '',
        'title' => '',
        'description' => '.',
        'employmentType' => [],
        'hiringOrganization' => [
            '@type' => 'Organization',
            'name' => '' // Example GmbH
            //'sameAs' => 'http://www.example.com',
            //'logo' => 'http://www.example.com/images/logo.png'
        ],
        'jobLocation' => [
            '@type' => 'Place',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '', // Straße und Hausnummer
                'addressLocality' => '', // Ort
                'addressRegion' => '', // Region wie 'Niedersachsen',
                'postalCode' => '', // PLZ
                'addressCountry' => ''
            ]
        ],
        /* 'baseSalary' => [
            '@type' => 'MonetaryAmount',
            'currency' => 'EUR',
            'value' => 'nach Vereinbarung / Qualifikation'
        ] */
    ];

    public function __construct() { }

    public function set($dotskey, $value)
    {
        $this->assignArrayByPath($this->sjp, $dotskey, $value, $separator='.');
    }

    public function assignArrayByPath(&$arr, $path, $value, $separator='.')
    {
        $keys = explode($separator, $path);
        foreach ($keys as $key) {
            $arr = &$arr[$key];
        }
        $arr = $value;
    }

    public function toJson()
    {
        return json_encode($this->sjp, JSON_PRETTY_PRINT);
    }

    public function toScript()
    {
        return '<script type="application/ld+json">' . $this->toJson() . '</script>';
    }

}

