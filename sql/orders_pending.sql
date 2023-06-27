create table orders_pending(order_id int primary key auto_increment,user_id int,invoice_number int(255),product_id int,
quantity int(255) ,order_status varchar(255));