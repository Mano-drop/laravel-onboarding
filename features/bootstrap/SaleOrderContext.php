<?php

use Behat\Behat\Tester\Exception\PendingException;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

/**
 * Defines application features from the specific context.
 */
class SaleOrderContext extends TestCase implements Context
{
    const URL = "http://localhost/laravel-onboarding/public/";
    private $client;
    private $body;
    private $action;
    private $response;
    private $editData;
    private $deleteId;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        parent::setup();

        $this->client = new Client([
            "base_uri" => self::URL
        ]);
    }

    /**
     * @Given The request body is:
     */
    public function theRequestBodyIs($body)
    {
        $this->body = $body;
    }

    /**
     * @When I post to :uri
     */
    public function iPostTo($uri)
    {
        $this->response = $this->client->post($uri, [
            RequestOptions::JSON => json_decode($this->body, true)
        ]);
    }

    /**
     * @Then the response code is :code
     */
    public function theResponseCodeIs($code)
    {
        return $this->response->getStatusCode() == $code;
    }

    /**
     * @Given the edit data is:
     */
    public function theEditDataIs($editData)
    {
        $this->editData = $editData;
    }

    /**
     * @When I put to :uri
     */
    public function iPutTo($uri)
    {
        $this->response = $this->client->put($uri, [
            RequestOptions::JSON => json_decode($this->editData, true)
        ]);
    }

    /**
     * @Given the delete id is :id
     */
    public function theDeleteIdIs($id)
    {
        $this->deleteId = $id;
    }

    /**
     * @Then I want to delete on :uri
     */
    public function iWantToDeleteOn($uri)
    {
        $this->response = $this->client->delete($uri . $this->deleteId);
    }

    /**
     * @Given I get to :uri
     */
    public function iGetTo($uri)
    {
        $this->response = $this->client->get($uri);
    }

    /**
     * @Then count at least :number sale order
     */
    public function countAtLeastSaleOrder($number)
    {
        $sale_order = json_decode($this->response->getBody()->getContents(), true);

        return count($sale_order) >= $number;
    }

    /**
     * @Then I want to truncate the sale_order and items tables
     */
    public function iWantToTruncateTheSaleOrderAndItemsTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sale_orders')->truncate();
        DB::table('order_items')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
