<?php

return [


	// Products page
	"/products/category/([a-z]+)" => "prod/getProdByCategor/$1",
	"/product/([0-9]+)" => "prod/getOneProd/$1",
	"/products" => "prod/index", 

	// Cart page
	
	"/cart/add/([0-9]+)" => "cart/addInCart/$1",
	"/cart/del/([0-9]+)" => "cart/delFromCart/$1",
	"/cart" => "cart/index",

	// Home page
	"/" => "home/index", 
	
	
	



];