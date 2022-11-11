START TRANSACTION;

INSERT INTO history(`client_id`, `performance_id`, `browse_date`) VALUES (1, 1, '2021-11-30');
INSERT INTO history(`client_id`, `performance_id`, `browse_date`) VALUES (1, 2, '2019-03-05');
INSERT INTO history(`client_id`, `performance_id`, `browse_date`) VALUES (2, 2, '2019-03-02');

COMMIT;