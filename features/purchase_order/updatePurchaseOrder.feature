@updatePurchase
Feature: update
    To update a purchase order
    As a user with permissions,
    I need to be able to place a new order and its items

    Scenario: update purchase order
        Given I have a purchase order:
            """
        {
            "date": "2021-07-03",
            "created_by": "MAURELVYS",
            "supplier": "LLLLLLL",
            "payment_term": "Sin descuento",
            "status": "entregado",
            "observations": "orden entregada",
            "dataItems": [
                    {
                        "id": 1,
                        "product_name": "Toallas",
                        "amount": 1,
                        "price": 2000,
                        "subtotal": 2000,
                        "purchase_order_id": 1
                    }
            ]
        }
            """

        When I update the order on "api/purchaseOrder/1"
        Then I want to see messenger "successfully updated"
