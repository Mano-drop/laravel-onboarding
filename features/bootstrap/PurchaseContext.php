<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class PurchaseContext implements Context
{
    const URL = "http://localhost/";

    private $user;
    private $receiving;
    private $response;
    public $identifier;
    private $msn;
    private $updateOrder;
    private $id;


    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct($user = null)
    {
        if(!is_null($user)) {
            $this->user = $user;
        } else {
        $this->user = new GuzzleClient([
            "base_uri" => self::URL
        ]);
            }

    }

    /**
     * @Given I create a purchase order:
     */
    public function iCreateAPurchaseOrder($receiving)
    {
        $this->receiving = $receiving;
    }

    /**
     * @When Send to :arg1
     */
    public function sendTo($identifier)
    {
        $this->response = $this->user->post($identifier, [
            RequestOptions::JSON => json_decode($this->receiving, true)
        ]);
    }

    /**
     * @Then I should see the text :arg1
     */
    public function iShouldSeeTheText($msn)
    {
        return $this->response->getStatusCode() == $msn;
    }

    /**
     * @Given I am on :arg1
     */
    public function iAmOn($identifier)
    {
        $this->response = $this->user->get($identifier);
    }

    /**
     * @Then Show :arg1 purchase order
     */
    public function showPurchaseOrder($id)
    {

        $purchaseOrder = json_decode($this->response->getBody(), true);

            foreach ($purchaseOrder as $order){

                if ($order['id'] == $id){

                    return count($purchaseOrder) >= $id;
                }
            }

            Throw new Exception('does not exist');
    }

    /**
     * @Given I have a purchase order:
     */
    public function iHaveAPurchaseOrder($updateOrder)
    {

        $this->updateOrder = $updateOrder;

    }

    /**
     * @When I update the order on :arg1
     */
    public function iUpdateTheOrderOn($identifier)
    {
        $this->response = $this->user->put($identifier, [
            RequestOptions::JSON => json_decode($this->updateOrder, true)
        ]);
    }

    /**
     * @Then I want to see messenger :arg1
     */
    public function iWantToSeeMessenger($msn)
    {
        return $this->response->getStatusCode() == $msn;
    }

    /**
     * @Given The purchase order exists with :arg1
     */
    public function thePurchaseOrderExistsWith($id)
    {
        $this->id = $id;

    }

    /**
     * @When I request delete on :arg1
     */
    public function iRequestDeleteOn($identifier)
    {

        $this->response = $this->user->delete($identifier . $this->id);

    }

    /**
     * @Then I want to see :arg1
     */
    public function iWantToSee($msn)
    {
        $this->response = $this->user->get('/');

        $responseCode = $this->response->getStatusCode();

        if ($responseCode != $msn){

            Throw new Exception('Does not exist');
        }

        return true;

    }

}
