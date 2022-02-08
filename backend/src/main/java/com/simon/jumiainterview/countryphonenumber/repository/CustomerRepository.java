package com.simon.jumiainterview.countryphonenumber.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.simon.jumiainterview.countryphonenumber.bean.Customer;

@Repository
public interface CustomerRepository extends JpaRepository<Customer, Integer> {

}
