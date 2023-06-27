create table user_orders(order_id int primary key auto_increment,user_id int,amount_due int,invoice_number int,
total_products int ,order_date TIMESTAMP,order_status varchar(255));