package com.simon.jumiainterview.countryphonenumber.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import com.simon.jumiainterview.countryphonenumber.bean.Customer;
import com.simon.jumiainterview.countryphonenumber.repository.CustomerRepository;

@RestController
public class CustomerController {
	
	@Autowired
	private CustomerRepository customerRepository;
	
	@GetMapping("/info")
	public String info() {
		return "Service is running!";
	}
	
	@CrossOrigin(origins = "http://localhost:8080")
	@GetMapping("/customer")
	public List<Customer> getAllCustomers(){
	
		return customerRepository.findAll();
	}

}
