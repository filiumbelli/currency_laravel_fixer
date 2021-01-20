<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Currency extends Model
{
    private $exchangeRates;
    private $queryDate;
    private $succeedsMessage;
    private $access_key;
    private $endpoint = 'latest';
    private $url;
    protected $fillable = ['currency','rate','updated_at'];
    private $dev = true;
    /**
     * @var int|mixed|string
     */


    public function setUrl($query ="")
    {
        $this->url = 'http://data.fixer.io/api/';

        $this->access_key = env('FIXER_API_KEY');
        $this->url .= $this->endpoint . "?access_key=$this->access_key";
        $this->url .= $query;
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);
        return $data;



    }

    public function getInterval($start_date, $end_date)
    {

        $query = "&start_date=$start_date&end_date=$end_date";
        $this->endpoint = "timeseries";
        return $this->setUrl($query);
    }

    public function getBase($base)
    {

        $base = strtoupper($base);
        $this->endpoint = "latest";
        $query = "&base=$base";

        return $this->setUrl($query);

    }

    public function getConversion($from, $to, $amount)
    {
        $from = strtoupper($from);
        $to = strtoupper($to);
        $this->endpoint = "convert";
        $query = "&from=$from&to=$to&amount=$amount";
        return $this->setUrl($query);

    }
    public function getFluctuation($start_date, $end_date)
    {
        $query = "&start_date=$start_date&end_date=$end_date";
        $this->endpoint = "fluctuation";
        return $this->setUrl($query);
    }


    public function getCurrencies()
    {
        return $this->exchangeRates;
    }


    public
    function getSuccessMessage()
    {
        return $this->succeedsMessage;
    }

    public
    function getQueryDate()
    {
        return $this->queryDate;
    }


}
