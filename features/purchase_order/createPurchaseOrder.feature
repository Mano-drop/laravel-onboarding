@createPurchase
Feature: create
    To make a purchase order
    As a user with permissions,
    I need to be able to place a new order and its items

    Scenario: create purchase order
        Given I create a purchase order:
            """
        {
            "date": "2021-06-26",
            "created_by": "Mauri",
            "supplier": "Limpia",
            "payment_term": "descuento",
            "status": "entregado",
            "observations": "orden entregada",
            "dataItems": [
                    {
                        "product_name": "kilo",
                        "amount": 1,
                        "price": 300,
                        "subtotal": 300
                    },
                    {
                        "product_name": "masa",
                        "amount": 1,
                        "price": 1500,
                        "subtotal": 1500
                    },
                    {
                        "product_name": "liquido",
                        "amount": 1,
                        "price": 1500,
                        "subtotal": 1500
                    }
                        ]
        }
            """

        When Send to "api/purchaseOrder"
        Then I should see the text "successfully created"
