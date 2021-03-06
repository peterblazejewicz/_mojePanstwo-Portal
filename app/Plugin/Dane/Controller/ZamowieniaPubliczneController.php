<?php

App::uses('DataobjectsController', 'Dane.Controller');

class ZamowieniaPubliczneController extends DataobjectsController
{
    public $menu = array();

    public function view()
    {

        parent::_prepareView();
        $url = 'http://sejmometr.pl/zamowienia_publiczne/' . $this->object->getId();
        $this->redirect($url);
        die();

        parent::view();
        $details = $this->object->loadLayer('details');
        $fields = $details['ZamowieniaPubliczne'];


        $przedmiot = str_replace(array("\n", "\r", "\t"), ' ', $fields['przedmiot']);
        $przedmiot = preg_replace('/(\s+)/i', ' ', $przedmiot);


        $przedmiot = preg_replace('/\. ([0-9]+)\./i', ".\n$1.", $przedmiot);
        $parts = explode("\n", $przedmiot);

        $paragraphs = array();

        foreach ($parts as $p) {

            $sentences = preg_split('/[.?!]/', $p);
            $chunks = array_chunk($sentences, 5);

            foreach ($chunks as $chunk)
                $paragraphs[] = implode(' ', $chunk);

        }


        $fields['przedmiot'] = '<p>' . implode("</p>\n<p>", $paragraphs) . '</p>';
        $this->set('details', $fields);
    }
} 