START TRANSACTION;

ALTER TABLE booking ADD COLUMN is_cancel INT;

ALTER TABLE booking_detail 
CHANGE visitor_First_Name visitor_first_name VARCHAR(128) NOT NULL;

ALTER TABLE seat CHANGE is_vacant is_reserved BOOLEAN DEFAULT false;

ALTER TABLE booking MODIFY is_cancel BOOLEAN DEFAULT false;

ALTER TABLE history ADD COLUMN browse_date DATETIME;

INSERT INTO artist(artist_name)VALUES('あいみょん'),('米津玄師');

ALTER TABLE performance ADD COLUMN artist_id INTEGER NOT NULL;

INSERT INTO client(
    client_password, 
    family_name, 
    first_name, 
    gender, 
    email_address, 
    mobile_phone_number,
    post_code, 
    prefecture, 
    city, 
    address, 
    Room_number
) VALUES (
    'abcc1', 
    '平山', 
    '武', 
    '男', 
    '3101021@s.asojuku.ac.jp',
    '91033233453',
    '612-4432', 
    '福岡県', 
    '博多区', 
    '3-1', 
    'ニューシティ801'
),

(
    'abcc2', 
    '前野', 
    '武美', 
    '女', 
    'osakasi@gmail.com',
    '91033245678', 
    '120-6394', 
    '大阪市', 
    '西成区', 
    '2-1', 
    'New York413'
),

(
    'abcc3',
    '志度',
    '朝日', 
    '男', 
    '5102012@s.asojuku.ac.jp',
    '91033245678',
    '120-6394', 
    '福岡県',
    '糸島市', 
    '5-9', 
    '有坂ビル206'
);

INSERT INTO seat_value(seat_name)
VALUES('立見席'), ('S席'), ('A席'), ('B席');

INSERT INTO performance(
    performance_name, 
    artist_name,
    place,
    performance_date,
    open_time,
    start_time,
    image_path
)VALUES(
    'AIMYON弾き語りTOUR 2021 “傷と悪魔と恋をした！',
    'あいみょん',
    '日本武道館',
    '2021-11-30',
    '18:30',
    '19:00',
    'https://localhost/TICKEPATH/IMAGES/PERFORMANCE/aimyon_live_image.png'
),

(
    '米津玄師 2019 TOUR / 脊椎がオパールになる頃',
    '米津玄師',
    '幕張メッセ 国際展示場ホール4〜6',
    '2019-3-10',
    '18:30',
    '19:30',
    'https://localhost/TICKEPATH/IMAGES/PERFORMANCE/yonedu_live_image.jpg'
);

UPDATE performance SET artist_id = 1 WHERE artist_name = 'あいみょん';
UPDATE performance SET artist_id = 2 WHERE artist_name = '米津玄師';

ALTER TABLE booking
CHANGE booking_date booking_date_time DATETIME NOT NULL;


INSERT INTO `seat` (`performance_id`, `seat_value_id`, `seat_price`, `is_reserved`) VALUES
(1, 2, '8800', 0),
(1, 3, '8000', 0),
(1, 4, '7500', 0),
(2, 2, '8800', 0),
(2, 3, '8000', 0),
(2, 4, '7500', 0),
(1, 3, '8000', 0),
(1, 4, '7500', 0),
(1, 1, '7000', 0),
(2, 1, '7000', 0),
(2, 3, '8000', 0),
(1, 2, '8800', 0),
(1, 3, '8000', 0),
(1, 4, '7500', 0),
(1, 2, '8800', 0),
(1, 3, '8000', 0),
(1, 4, '7500', 0);


INSERT INTO history(`client_id`, `performance_id`, `browse_date`) VALUES (1, 1, '2021-11-30');
INSERT INTO history(`client_id`, `performance_id`, `browse_date`) VALUES (1, 2, '2019-03-05');
INSERT INTO history(`client_id`, `performance_id`, `browse_date`) VALUES (2, 2, '2019-03-02');


COMMIT;
