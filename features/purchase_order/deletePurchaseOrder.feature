@deletePurchase
    Feature: Delete
        To delete a purchase order
        As a user with permissions
        I need to identify the order by its id
    Scenario: delete a purchase order
        Given The purchase order exists with 18
        When I request delete on "api/purchaseOrder/"
        Then I want to see 200
