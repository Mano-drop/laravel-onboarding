@createRequest
    Feature: I am going to create a request order to test an API.
    Scenario: Create A request order
        Given These are the data of the request order:
			"""
		{
            "date": "2021-07-08",
            "created_by": "caballero",
            "status": "vivo",
            "observations": "ginete",
            "itemsRequests": [
                {
                    "product_name": "armadura",
                    "amount": "5"
                }
            ]
        }
        	"""
        When I post link "api/request_order"
        Then The result will be "excellent"
