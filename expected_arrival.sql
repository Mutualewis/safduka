CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `ngeatpmfkdb`@`localhost` 
    SQL SECURITY DEFINER
VIEW `expected_arrival` AS
    SELECT 
        `cfd`.`id` AS `id`,
        `cfd`.`sl_id` AS `slid`,
        `sl`.`sl_no` AS `sale`,
        `sl`.`sl_date` AS `date`,
        `sl`.`ctr_id` AS `slctrid`,
        `slr`.`slr_name` AS `slr_name`,
        `wr`.`wr_name` AS `wr_name`,
        (`sl`.`sl_date` + INTERVAL 6 DAY) AS `prompt_date`,
        `csn`.`csn_season` AS `csn_season`,
        `cfd`.`csn_id` AS `csn_id`,
        `cfd`.`cfd_lot_no` AS `lot`,
        IFNULL(`prc`.`inv_outturn`, `cfd`.`cfd_outturn`) AS `outturn`,
        IFNULL(`prc`.`inv_mark`,
                `cfd`.`cfd_grower_mark`) AS `mark`,
        `cgrad`.`cgrad_name` AS `grade`,
        NULL AS `green`,
        IF((`st`.`st_partial_delivery` IS NOT NULL),
            (IFNULL(`war`.`war_weight`,
                    IFNULL(`prc`.`inv_weight`, `cfd`.`cfd_weight`)) - SUM(`st`.`st_net_weight`)),
            IFNULL(`war`.`war_weight`,
                    IFNULL(`prc`.`inv_weight`, `cfd`.`cfd_weight`))) AS `weight`,
        IFNULL(FLOOR((IF((`st`.`st_partial_delivery` IS NOT NULL),
                            (IFNULL(`war`.`war_weight`,
                                    IFNULL(`prc`.`inv_weight`, `cfd`.`cfd_weight`)) - SUM(`st`.`st_net_weight`)),
                            IFNULL(`war`.`war_weight`,
                                    IFNULL(`prc`.`inv_weight`, `cfd`.`cfd_weight`))) / 60)),
                `cfd`.`cfd_bags`) AS `bags`,
        IFNULL(FLOOR((IF((`st`.`st_partial_delivery` IS NOT NULL),
                            (IFNULL(`war`.`war_weight`,
                                    IFNULL(`prc`.`inv_weight`, `cfd`.`cfd_weight`)) - SUM(`st`.`st_net_weight`)),
                            IFNULL(`war`.`war_weight`,
                                    IFNULL(`prc`.`inv_weight`, `cfd`.`cfd_weight`))) % 60)),
                `cfd`.`cfd_pockets`) AS `pockets`,
        `sl`.`sl_hedge` AS `hedge`,
        `sl`.`sl_month` AS `month`,
        `cb`.`id` AS `cbid`,
        `cb`.`cb_name` AS `buyer`,
        `prc`.`id` AS `prcid`,
        `prc`.`prc_price` AS `auc_price`,
        `prc`.`prc_confirmed_price` AS `price`,
        `br`.`id` AS `brid`,
        `br`.`br_no` AS `bric`,
        `br`.`br_date` AS `br_date`,
        `bs`.`id` AS `bsid`,
        `bs`.`bs_code` AS `code`,
        `bs`.`bs_quality` AS `quality`,
        `rl`.`rl_no` AS `rl_no`,
        `rl`.`rl_date` AS `rl_date`,
        ((IFNULL(`war`.`war_weight`,
                IFNULL(`prc`.`inv_weight`, `cfd`.`cfd_weight`)) / 50) * `prc`.`prc_confirmed_price`) AS `value`,
        TRUNCATE(((`prc`.`prc_confirmed_price` / 1.1023) - `sl`.`sl_hedge`),
            2) AS `differential`,
        `st`.`st_moisture` AS `st_moisture`,
        `st`.`pkg_id` AS `pkg_id`,
        `st`.`st_dispatch_net` AS `st_dispatch_net`,
        `st`.`st_gross` AS `st_gross`,
        `sloc`.`loc_row_id` AS `loc_row_id`,
        `sloc`.`loc_column_id` AS `loc_column_id`,
        `sloc`.`btc_zone` AS `btc_zone`,
        `gr`.`gr_number` AS `gr_number`,
        `btc`.`btc_packages` AS `btc_packages`,
        `cfd`.`slr_id` AS `slrid`,
        `prall`.`id` AS `prallid`,
        `war`.`id` AS `warid`,
        `war`.`war_no` AS `war_no`,
        `st`.`st_partial_delivery` AS `partial_delivery`
    FROM
        (((((((((((((((((`coffee_details_cfd` `cfd`
        LEFT JOIN `sale_sl` `sl` ON ((`sl`.`id` = `cfd`.`sl_id`)))
        LEFT JOIN `purchases_prc` `prc` ON ((`cfd`.`id` = `prc`.`cfd_id`)))
        LEFT JOIN `stock_st` `st` ON ((`st`.`prc_id` = `prc`.`id`)))
        LEFT JOIN `batch_btc` `btc` ON ((`btc`.`st_id` = `st`.`id`)))
        LEFT JOIN `stock_location_sloc` `sloc` ON ((`sloc`.`bt_id` = `btc`.`id`)))
        LEFT JOIN `grn_gr` `gr` ON ((`gr`.`id` = `st`.`gr_id`)))
        LEFT JOIN `coffee_seasons_csn` `csn` ON ((`csn`.`id` = IFNULL(`st`.`csn_id`, `cfd`.`csn_id`))))
        LEFT JOIN `coffee_grade_cgrad` `cgrad` ON ((`cgrad`.`id` = IFNULL(`st`.`cgrad_id`, `cfd`.`cgrad_id`))))
        LEFT JOIN `coffee_buyers_cb` `cb` ON ((`cb`.`id` = IFNULL(`st`.`cb_id`, `prc`.`cb_id`))))
        LEFT JOIN `basket_bs` `bs` ON ((`bs`.`id` = IFNULL(`st`.`bs_id`, `prc`.`bs_id`))))
        LEFT JOIN `bric_br` `br` ON ((`br`.`id` = IFNULL(`st`.`br_id`, `prc`.`br_id`))))
        LEFT JOIN `release_instructions_rl` `rl` ON ((`rl`.`id` = `prc`.`rl_id`)))
        LEFT JOIN `warrants_war` `war` ON ((`war`.`id` = `prc`.`war_id`)))
        LEFT JOIN `invoices_inv` `inv` ON ((`inv`.`id` = `prc`.`inv_id`)))
        LEFT JOIN `seller_slr` `slr` ON ((`slr`.`id` = `cfd`.`slr_id`)))
        LEFT JOIN `warehouse_wr` `wr` ON ((`wr`.`id` = `cfd`.`wr_id`)))
        LEFT JOIN `provisional_allocation_prall` `prall` ON ((`prall`.`cfd_id` = `cfd`.`id`)))
    WHERE
        ((((`prc`.`rl_id` IS NOT NULL)
            AND ISNULL(`st`.`st_net_weight`)
            AND (`cb`.`bt_id` = 1)
            AND ISNULL(`prc`.`gr_id`))
            OR (`st`.`st_partial_delivery` IS NOT NULL))
            AND (`prc`.`sst_id` = 2)
            AND ISNULL(`btc`.`btc_ended_by`))
    GROUP BY `cfd`.`id`