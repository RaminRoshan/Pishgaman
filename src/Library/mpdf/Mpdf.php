<?php

namespace Pishgaman\Pishgaman\Library\mpdf;

use Pishgaman\Pishgaman\Library\mpdf\MpdfInterface;
use Illuminate\Support\Facades\Log;

class Mpdf implements MpdfInterface
{
    private $mpdf;
    
    public function __construct()
    {
        require_once 'vendor/autoload.php';
        $this->mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
        $this->mpdf->autoScriptToLang = true;
        $this->mpdf->autoLangToFont = true;
        $this->mpdf->SetDisplayMode('fullpage');
    }
    public function AddPage($mpdf,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$head_title='')
    {
        if($head_title != '')
        {
            $head_conf = 
            [
                'L' => [
                    'content' => '<P style="text-align:center;direction:rtl;font-size:22px">&nbsp; {PAGENO} </P>',
                ],
                'C' => [
                    'content' => '',
                ],
                'R' => [
                    'content' => $head_title,
                ],
                'line' => 0,
            ];
            $headFootConf = [
                'odd'=>$head_conf,
                'even'=>$head_conf
            ];
            $mpdf->setHeader($headFootConf);
        }
        $mpdf->AddPage($var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11);
    }

    public function AddPageSample($mpdf)
    {
        $mpdf->AddPage();
    }

    //for test package 
    public function Hello($path='')
    {
        $this->mpdf->WriteHTML('<h1 >سلام دنیا!</h1>');
        if($path == '')
            $this->mpdf->Output();
        else
        {
            $this->mpdf->Output($path,'F');
            return true;
        }
    }

    //Convert Html String to PDF
    public function stringToPdf($stringVariable,$path='')
    {
        $stringVariable = mb_convert_encoding($stringVariable,'UTF-8','UTF-8');
        $this->mpdf->WriteHTML($stringVariable);
        if($path == '')
            $this->mpdf->Output();
        else
        {
            $this->mpdf->Output($path,'F');
            return true;
        }
    }

    //Convert url web to PDF
    public function urlToPdf($url,$direction='rtl')
    {
        $html = file_get_contents($url);
        $first_step = explode( '<urlToPdf>' , $html );
        $second_step = explode("</urlToPdf>" , $first_step[1] );
        $this->mpdf->SetDirectionality($direction);
        $this->mpdf->WriteHTML($second_step[0]);
        $this->mpdf->Output();
    }

    public function WriteHTML($mpdf,$stringVariable,$head_title='')
    {
        if($head_title != '')
        {
            $head_conf = 
            [
                'L' => [
                    'content' => '<P style="text-align:center;direction:rtl;font-size:22px">&nbsp; {PAGENO} </P>',
                ],
                'C' => [
                    'content' => '',
                ],
                'R' => [
                    'content' => $head_title,
                ],
                'line' => 0,
            ];
            $headFootConf = [
                'odd'=>$head_conf,
                'even'=>$head_conf
            ];
            $mpdf->setHeader($headFootConf);
        }
        $mpdf->use_kwt = true;
        $mpdf->WriteHTML($stringVariable);
    }

    public function save($mpdf,$path='')
    {
        if($path == '')
            $mpdf->Output();
        else
        {
            $mpdf->Output($path,'F');
            return true;
        }
    }
    
    public function SetDirectionality($mpdf,$direction)
    {
        return $mpdf->SetDirectionality($direction);
    }

    public function SetDefaultBodyCSS($mpdf,$Properties,$value)
    {
        return $mpdf->SetDefaultBodyCSS(($Properties ?? 'color'),($value ?? 'black)'));
    }

    public function Bookmark($mpdf,$Bookmark)
    {
        return $mpdf->Bookmark($Bookmark ?? 'میز خدمت الکترونیک دانشگاه رازی');
    }

    public function SetTitle($mpdf,$title)
    {
        return $mpdf->SetTitle($title ?? 'My Title');
    }

    public function init($mode , $SetDisplayMode , $format)
    {
        require_once 'vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf([
            'mode' => ($mode ?? 'utf-8'),
            'format'=>($format ?? 'A4-L'),
            'setAutoTopMargin'=>'stretch',
            'autoMarginPadding'=>8,  
            'default_font' => 'irsans'
        ]);
        // $mpdf->autoScriptToLang = true;
        // $mpdf->autoLangToFont = true;
        $mpdf->autoArabic = true;
        $mpdf->showImageErrors = true;
        $mpdf->SetDisplayMode(($SetDisplayMode ?? 'fullpage'));  
   
        $mpdf->defaultheaderfontsize=14;
        $mpdf->defaultheaderfontstyle='B';
        $mpdf->defaultheaderline=0;
        // $mpdf->
        return $mpdf;
    }

    public function DefHtmlHeaderByName($mpdf,$Chapter1,$Chapter2)
    {
        $mpdf->DefHtmlHeaderByName($Chapter1,$Chapter2);
    }
}
