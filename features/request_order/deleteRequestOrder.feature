@deleteRequestOrder
Feature: I am going to delete a request order to test an API

    Scenario: delete the request order N:
        Given delete request order data 10
        When "api/request_order"
        Then The result will be "excellent"

