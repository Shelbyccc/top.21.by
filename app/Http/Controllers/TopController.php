<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        var_dump($this->_parseTUT());
        echo '<br>';
        echo '<br>';
        var_dump($this->_parseOnliner());
        echo '<br>';
        echo '<br>';
        var_dump($this->_parseBelta());
        echo '<br>';
        echo '<br>';
        var_dump($this->_parseMail());
        echo '<br>';
        echo '<br>';
        /*
        $this->_parseYandex();
        $this->_parseBelapan();
        $this->_parseInterfax();
        $this->_parseBT();
        $this->_parseONT();
        $this->_parseCTV();
        $this->_parseKP();
        $this->_parseCharter();
        $this->_parseBP();
        $this->_parseNaviny();
        $this->_parseUDF();
        */
    }

    public function _parseTUT()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.tut.by');
        $result = array();
        $crawler->filter('.b-topnews .b-newsfeed .entry__link')->each(function($node, $i) use (&$result){
            if ($i>2) return;
            $result[] = array('name'=>$node->text(), 'url'=> $node->attr('href'));
        });
        return $result;
    }

    public function _parseOnliner()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.onliner.by');
        $result = array();
        $crawler->filter('.b-main-page-news-2__main-news-title h2 a')->each(function($node, $i) use (&$result){
            if ($i>2) return;
            $result[] = array('name'=>$node->text(), 'url'=> $node->attr('href'));
        });
        return $result;
    }

    public function _parseBelta()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'http://www.belta.by');
        $result = array();
        $crawler->filter('.main_news_block .main_news2_item a')->each(function($node, $i) use (&$result){
            if ($i>2) return;
            $result[] = array('name'=>$node->attr('title'), 'url'=> $node->attr('href'));
        });
        return $result;
    }

    public function _parseMail()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://mail.ru');
        $result = array();
        $crawler->filter('.grid div')->each(function($node, $i) use (&$result){
            if ($i>2) return;
            $result[] = array('name'=>$node->attr('class'), 'url'=> $node->attr('href'));
        });
        return $result;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
