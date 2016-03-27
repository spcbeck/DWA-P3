<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte\Client;

class ArticleController extends Controller {

    /**
    * Responds to requests to GET /articles
    */
    public function getIndex() {
        return view('articles.index');
    }

    /**
     * Responds to requests to GET /writers/scrape
     */
    public function getScrapeWriters() {
        $client = new Client();

        $listicleItems = array();

        $crawler = $client->request('GET', 'http://www.buzzfeed.com/crystalro/zoltar-speaks');

        for($i = 0; $i < 10; $i++) {
            $listicle = $crawler->filter(".byline__author")->text();

            $listicleItems[] = $listicle;

            $link = $crawler->filter(".related-title")->link();
            $crawler = $client->click($link);
        }

        return $listicleItems;
    }

    /**
     * Responds to requests to Post /writers/create
     */
    public function postCreateWriter() {
      
    }


    /**
     * Responds to requests to GET /articles/scrape
     */
    public function getScrapeArticle(Request $request) {
        $client = new Client();

        //check if articles array file exists, if so use it, if not create a new array.
        if(file_exists("articles.txt")){
            $recoveredArticles = file_get_contents('articles.txt');
            $articleItems = json_decode($recoveredArticles);
        } else {
            $articleItems = array();
        }

        //check if articles array file exists, if so use it, if not create a new array.
        if(file_exists("listicles.txt")){
            $recoveredListicles = file_get_contents('listicles.txt');
            $listicleItems = json_decode($recoveredListicles);
        } else {
            $listicleItems = array();
        }

        //check if articles array file exists, if so use it, if not create a new array.
        if(file_exists("writers.txt")){
            $recoveredWriters = file_get_contents('writers.txt');
            $writers = json_decode($recoveredWriters);
        } else {
            $writers = array();
        }
       

        $crawler = $client->request('GET', 'http://www.buzzfeed.com/');

        $link = $crawler->filter(".thumb1 a")->first()->link();
        $crawler = $client->click($link);

        for($i = 0; $i < 10; $i++) {
            
            if($crawler->filter(".list_format_dec_up .buzz_superlist_item h2")->count()) {
                $listiclePiece = $crawler->filter(".buzz_superlist_item h2")->extract(array('_text'));
            } else {
                $listiclePiece = null;
            }

            if($crawler->filter(".list_format_long #buzz_sub_buzz p")->count()){
                $articlePiece = $crawler->filter("#buzz_sub_buzz p")->extract(array('_text'));
            } else {
                $articlePiece = null;
            }

            if($crawler->filter("#post-title")->count()){
                $header = $crawler->filter("#post-title")->text();
            } else {
                $header = "";
            }

            if($crawler->filter(".byline__author")->count()){
                $writer = $crawler->filter(".byline__author")->text();
            } else {
                $writer = $crawler->filter(".user-info-info a")->text();
            }

            if(!in_array($listiclePiece, $listicleItems) && $listiclePiece != "") {
                $listicleItems[] = $listiclePiece;
            }

            if(!in_array($articlePiece, $articleItems) && !is_null($articlePiece)) {
                $articleItems[] = $articlePiece;
            }

            if(!in_array($header, $articleItems) && $header != "") {
                $articleItems[] = $header;
            }

            if(!in_array($writer, $writers) && $writer != "") {
                $writers[] = $writer;
            }

            if($crawler->filter(".small-posts h3 a")->count()){
                $link = $crawler->filter(".small-posts h3 a")->link();
                $crawler = $client->click($link);
            }
        }

        $serializedArticles = json_encode($articleItems);
        $jsonWriters = json_encode($writers);
        $jsonListicles = json_encode($listicleItems);

        file_put_contents('writers.txt', $jsonWriters);
        file_put_contents('articles.txt', $serializedArticles);
        file_put_contents('listicles.txt', $jsonListicles);


        return $serializedArticles;
    }

    /**
     * Responds to requests to POST /articles/create
     */
    public function postCreateArticle(Request $request) {

        if($request->input("listicle") != null){
            //check if articles array file exists, if so use it to create an article, if not create a new array.
            if(file_exists("listicles.txt")){
                $recoveredArticles = file_get_contents('listicles.txt');

                $paragraphAmount = $request->input("paragraphAmount");

                $article = array();

                $listicleItems = explode('","', $recoveredArticles);

                //Create the article from piecing together paragraphs
                for($i = 0; $i < $paragraphAmount; $i++){
                    $paragraphArray = array();

                    for($x = 0; $x < 3; $x++) {
                        $k = array_rand($listicleItems);
                        $paragraphArray[] = $listicleItems[$k];

                    }

                    $paragraph = implode($paragraphArray);


                    $paragraph = str_replace("\u2019", "'", $paragraph);
                    $paragraph = str_replace("\u2018", "'", $paragraph);
                    $paragraph = str_replace("\u201c", "\"", $paragraph);
                    $paragraph = str_replace("\u201d", "\"", $paragraph);
                    $paragraph = str_replace("\u2014", "–", $paragraph);
                    $paragraph = str_replace("\u2026", "...", $paragraph);
                    $paragraph = str_replace("\u00a0", "", $paragraph);
                    $paragraph = str_replace("View this image \u203a", "", $paragraph);
                    $paragraph = str_replace("\",\"", " ", $paragraph);
                    $article[] = $paragraph;
                }

                if(is_array($listicleItems)){
                    return view('articles.index')->with("listicle", $article);
                } else {
                    return view('articles.index');
                }
            } else {
                $listicleItems = array();
            }
        } elseif($request->input("longform") != null) {
            //check if articles array file exists, if so use it to create an article, if not create a new array.
            if(file_exists("articles.txt")){
                $recoveredArticles = file_get_contents('articles.txt');
                $listicleItems = json_decode($recoveredArticles);

                $paragraphAmount = $request->input("paragraphAmount");

                $article = array();

                $listicleItems = explode('. ', $recoveredArticles);

                //Create the article from piecing together paragraphs
                for($i = 0; $i < $paragraphAmount; $i++){
                    $paragraphArray = array();

                    for($x = 0; $x < 3; $x++) {
                        $k = array_rand($listicleItems);
                        $paragraphArray[] = $listicleItems[$k];

                    }

                    $paragraph = implode($paragraphArray);


                    $paragraph = str_replace("\u2019", "'", $paragraph);
                    $paragraph = str_replace("\u2018", "'", $paragraph);
                    $paragraph = str_replace("\u201c", "\"", $paragraph);
                    $paragraph = str_replace("\u201d", "\"", $paragraph);
                    $paragraph = str_replace("\u2014", "–", $paragraph);
                    $paragraph = str_replace("\u2026", "...", $paragraph);
                    $paragraph = str_replace("\u00a0", "", $paragraph);
                    $paragraph = str_replace("View this image \u203a", "", $paragraph);
                    $paragraph = str_replace("\",\"", " ", $paragraph);
                    $article[] = $paragraph;
                }

                if(is_array($listicleItems)){
                    return view('articles.index')->with("article", $article);
                } else {
                    return view('articles.index');
                }
            } else {
                $listicleItems = array();
            }
        }
    }
}