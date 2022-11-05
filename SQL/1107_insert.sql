START TRANSACTION;

INSERT INTO booking(booking_date, client_id)
VALUES('2021-10-30', 1),
('2021-10-30', 2),
('2021-10-30', 3),

('2019-02-10', 1),
('2019-02-10', 2),
('2019-02-10', 3);

INSERT INTO booking_detail(
    booking_id,
    visitor_family_name,
    visitor_first_name,
    seat_id
)VALUES
(1, '平山', '武', 1),
(2, '前野', '武美', 2),
(3, '志度', '朝日', 3),

(4, '平山', '武', 4),
(5,'前野', '武美', 5),
(6, '志度', '朝日', 6);

COMMIT;