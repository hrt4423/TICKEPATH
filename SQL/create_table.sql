CREATE TABLE seat_value(
    seat_value_id INTEGER NOT NULL,
    seat_name VARCHAR(128) NOT NULL,

    PRIMARY KEY(seat_value_id)
);


CREATE TABLE artist(
    artist_id INTEGER NOT NULL,
    artist_name VARCHAR(128) NOT NULL,

    PRIMARY KEY(artist_id)
);


CREATE TABLE performance(
    performance_id INTEGER NOT NULL,
    performance_name VARCHAR(128) NOT NULL,    
    artist_name VARCHAR(128) NOT NULL,
    place VARCHAR(128) NOT NULL,
    performance_date DATE NOT NULL,    
    open_time TIME NOT NULL,
    start_time TIME NOT NULL

    PRIMARY KEY(performance_id)
);


CREATE TABLE client(
    client_id INTEGER NOT NULL,
    client_password VARCHAR(128) NOT NULL,
    family_name VARCHAR(128) NOT NULL,
    first_name VARCHAR(128) NOT NULL,
    gender VARCHAR(5) NOT NULL,
    email_address VARCHAR(128) NOT NULL,
    mobile_phone_number CHAR(10) NOT NULL,
    post_code VARCHAR(128) NOT NULL, /*郵便番号*/
    prefecture VARCHAR(128) NOT NULL, /*都道府県*/
    city VARCHAR(128) NOT NULL, /*市区町村*/
    address VARCHAR(128) NOT NULL, /*番地*/
    Room_number VARCHAR(128), /*マンション名/部屋番号*/

    PRIMARY KEY(client_id)
);


CREATE TABLE booking(
    booking_id INTEGER NOT NULL,
    booking_date DATE NOT NULL,
    client_id INTEGER NOT NULL,

    PRIMARY KEY(booking_id),

    FOREIGN KEY booking_fk_1(client_id)REFERENCES client(client_id)
    ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE favorite(
    client_id INTEGER NOT NULL,
    artist_id INTEGER NOT NULL,

    PRIMARY KEY(client_id,artist_id),

    FOREIGN KEY favorite_fk_1(client_id)REFERENCES client(client_id)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY favorite_fk_2(artist_id)REFERENCES artist(artist_id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE history(
    client_id INTEGER NOT NULL,
    performance_id INTEGER NOT NULL,

    PRIMARY KEY(client_id,performance_id),

    FOREIGN KEY history_fk_1(client_id)REFERENCES client(client_id)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY history_fk_2(performance_id)REFERENCES performance(performance_id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE seat(
    seat_id INTEGER NOT NULL,
    performance_id INTEGER NOT NULL,
    seat_value_id INTEGER NOT NULL, 
    seat_price VARCHAR(128)NOT NULL,
    is_vacant INTEGER NOT NULL, /*0:空席, 1:予約済み*/

    PRIMARY KEY (seat_id,performance_id),

    FOREIGN KEY seat_fk_1(performance_id)REFERENCES performance(Performance_id)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY seat_fk_2(seat_value_id)REFERENCES seat_value(seat_value_id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE booking_detail(
    booking_detail_id INTEGER NOT NULL,
    visitor_family_name VARCHAR(128) NOT NULL,
    visitor_First_Name VARCHAR(128) NOT NULL,
    booking_id INTEGER NOT NULL,
    seat_id INTEGER NOT NULL,

    PRIMARY KEY(booking_detail_id,booking_id),

    FOREIGN KEY booking_fk_1(booking_id)REFERENCES booking(booking_id)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY booking_fk_2(seat_id)REFERENCES seat(seat_id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);
