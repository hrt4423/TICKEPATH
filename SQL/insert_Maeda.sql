START TRANSACTION;
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
    'abcc4', 
    '郷野', 
    '晋三', 
    '男', 
    '6101061@s.asojuku.ac.jp',
    '81037890092',
    '513-6679', 
    '福岡県', 
    '福岡市中央区', 
    '2-14', 
    '天神ビル201'
),

(
    'abcc5', 
    '桜田', 
    '洋子', 
    '女', 
    'hatena@gmail.com',
    '09071235564', 
    '777-9009', 
    '神奈川県', 
    '横浜市', 
    '7-77', 
    '横浜タワーマンション1107'
),

(
    'abcc6',
    '弓削',
    '夕日', 
    '男', 
    '7101071@s.asojuku.ac.jp',
    '08098773453',
    '862-0009', 
    '福岡県',
    '博多区美野島3丁目', 
    '2-21', 
    '田中ビル409'
);

INSERT INTO artist(
    artist_name
)VALUES(
    'あいみょん'
),

(
    '米津玄師'
),

(
    'Ado'
);

INSERT INTO favorite(
    client_id,
    artist_id
)VALUES(
    '1',
    '2'
),

(
    '3',
    '1'
),

(
    '4',
    '123'
),

(
    '5',
    '31'
),

(
    '6',
    '3'
);

COMMIT;