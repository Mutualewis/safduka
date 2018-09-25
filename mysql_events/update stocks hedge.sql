UPDATE stock_st t1 
        INNER JOIN purchases_prc t2 
             ON t1.prc_id = t2.id

SET t1.st_hedge = t2.prc_hedge
