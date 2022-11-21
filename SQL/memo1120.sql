select seat_value_id, count(*)
from seat
where performance_id = 1
and seat_value_id = 2
and is_reserved = false;