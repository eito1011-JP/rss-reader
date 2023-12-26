<?php

namespace App\Http\Controllers;

use App\Http\Requests\RemoveWordsRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class RssController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Show Delete Word Form
     *
     * @param ShowDeleteWordFormRequest $showDeleteWordFormRequest
     */
    public function showDeleteWordForm()
    {
        return view('showDeleteWordForm');
    }

    /**
     * Remove Words
     *
     * @param DeleteWordsRequest $removeWordsRequest
     */
    public function removeWords(RemoveWordsRequest $removeWordsRequest)
    {
        $xmlDataArray = [];
        try {
            foreach ($removeWordsRequest->url as $key => $url) {
                $explodedWords = explode(" ", $removeWordsRequest->remove_words[$key]);
                $xml = simplexml_load_file($url);
                $xmlString = $xml->asXML();
                $convertedHtml = html_entity_decode($xmlString, ENT_QUOTES | ENT_XML1, 'UTF-8');
                $xmlDataArray[] = str_replace($explodedWords, '', $convertedHtml);
            }
        } catch (Exception $e) {
            Log::error($e);
        }

        return view('afterRemovedRss', ['xmlDataArray' => $xmlDataArray]);
    }
}
