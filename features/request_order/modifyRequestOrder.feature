@modifyRequestOrder
    Feature: I am going to change a request order to test an API
    Scenario: Change a request order
    Given These are the data to change of the request order:
	    """
    {
        "date": "2021-07-13",
        "created_by": "Rey",
        "status": "compldetao",
        "observations": "para un torneo",
        "itemsReq": [
            {
                "id": 25,
                "product_name": "katana",
                "amount": "10",
            "request_id": 15
            }
        ]
    }
        """
        When I put link "api/request_order/15"
        Then The result will be "excellent"
