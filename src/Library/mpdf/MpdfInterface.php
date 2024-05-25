<?php

namespace Pishgaman\Pishgaman\Library\mpdf;

interface MpdfInterface
{   
    public function AddPage($mpdf,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$head_title='');
    public function AddPageSample($mpdf);
    public function Hello($path='');
    public function stringToPdf($stringVariable,$path='');
    public function urlToPdf($url);
    public function save($mpdf,$path='');
    public function SetDirectionality($mpdf,$direction);
    public function SetDefaultBodyCSS($mpdf,$Properties,$value);
    public function Bookmark($mpdf,$Bookmark);
    public function SetTitle($mpdf,$title);
    public function init($mode,$SetDisplayMode,$format);
    public function WriteHTML($mpdf,$stringVariable,$head_title='');
    public function DefHtmlHeaderByName($mpdf,$Chapter1,$Chapter2);
}
