
UPDATE purchases_prc t1 
        INNER JOIN coffee_details_cfd t2 
             ON t1.cfd_id = t2.id
        INNER JOIN sale_sl t3
             ON t2.sl_id = t3.id

SET t1.prc_hedge = t3.sl_hedge
where  t1.prc_hedge = '0.0000000000' 
#and t2.id  > 8000