<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeshaUpdates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            INSERT INTO `ngea_db`.`menu_mn` (`id`, `mn_name`, `mn_description`, `mn_url`, `mn_level`, `mn_parent`, `mn_order`) VALUES ('162', 'Transfer Ownership', 'Transfer ownership of coffee.', 'transferownership', '2', '13', '8') ON DUPLICATE KEY UPDATE 
            `mn_name` = 'Transfer Ownership',
            `mn_description` = 'Transfer ownership of coffee.',
            `mn_url` = 'transferownership',
            `mn_level` = '2',
            `mn_parent` = '13',
            `mn_order` = '8';
            UPDATE `ngea_db`.`menu_mn` SET `mn_order`='9' WHERE `id`='158';
            INSERT IGNORE INTO `ngea_db`.`groupmenu_gpm` (`id`, `dprt_id`, `mn_id`, `rl_ids`) VALUES ('776', '4', '162', '[\"1\"]') ;
            INSERT IGNORE INTO `ngea_db`.`groupmenu_gpm` (`id`, `dprt_id`, `mn_id`, `rl_ids`) VALUES ('778', '10', '162', '[\"1\",\"4\"]') ;

            CREATE 

            VIEW `stocks_warehouse` AS
                SELECT 
                    `btc`.`id` AS `id`,
                    `sloc`.`id` AS `slocid`,
                    `csn`.`csn_season` AS `csn_season`,
                    `btc`.`btc_number` AS `btc_number`,
                    `btc`.`btc_instructed_by` AS `btc_instructed_by`,
                    `st`.`id` AS `stid`,
                    `st`.`grn_id` AS `gr_id`,
                    `gr`.`gr_number` AS `gr_number`,
                    `dp`.`dp_number` AS `dp_number`,
                    `st`.`st_outturn` AS `name`,
                    `st`.`st_outturn` AS `st_outturn`,
                    `cgr`.`cgr_grower` AS `cgr_grower`,
                    `st`.`st_mark` AS `st_mark`,
                    IFNULL(`mt`.`mt_name`,
                            CONVERT( `prt`.`prt_name` USING UTF8)) AS `grade`,
                    `st`.`st_gross` AS `st_gross`,
                    `st`.`st_tare` AS `st_tare`,
                    `st`.`st_moisture` AS `st_moisture`,
                    `pkg`.`pkg_name` AS `pkg_name`,
                    `st`.`st_net_weight` AS `st_net_weight`,
                    `st`.`st_packages` AS `st_packages`,
                    `st`.`st_bags` AS `st_bags`,
                    `st`.`st_pockets` AS `st_pockets`,
                    IFNULL(`insloc`.`insloc_weight`,
                            `btc`.`btc_net_weight`) AS `btc_weight`,
                    FLOOR((IFNULL(`insloc`.`insloc_weight`,
                                    `btc`.`btc_net_weight`) / 60)) AS `btc_bags`,
                    FLOOR((IFNULL(`insloc`.`insloc_weight`,
                                    `btc`.`btc_net_weight`) % 60)) AS `btc_pockets`,
                    `btc`.`btc_tare` AS `btc_tare`,
                    `btc`.`btc_net_weight` AS `btc_net_weight`,
                    `btc`.`btc_packages` AS `btc_packages`,
                    (`prts`.`prts_bags` + IF((`prts`.`prts_pockets` <> 0), 1, 0)) AS `dmp_packages`,
                    (`btc`.`btc_packages` - (`prts`.`prts_bags` + IF((`prts`.`prts_pockets` <> 0), 1, 0))) AS `package_dff`,
                    `agt`.`id` AS `wrid`,
                    `loc_row`.`id` AS `loc_rowid`,
                    `loc_column`.`id` AS `loc_columnid`,
                    `loc_row`.`loc_row` AS `loc_row`,
                    `loc_column`.`loc_column` AS `loc_column`,
                    `sloc`.`btc_zone` AS `btc_zone`,
                    CONCAT(MAX(`agt`.`agt_name`),
                            '-',
                            MAX(`loc_row`.`loc_row`),
                            MAX(`loc_column`.`loc_column`),
                            MAX(`sloc`.`btc_zone`)) AS `location`,
                    `agt`.`agt_name` AS `wr_name`,
                    IFNULL(`ibs`.`ibs_code`, `bs`.`bs_code`) AS `code`,
                    `mit`.`mit_name` AS `mit_name`,
                    `mt`.`mt_name` AS `mt_name`,
                    st_owner_id
                FROM
                    (((((((((((((((((((((((`batch_btc` `btc`
                    LEFT JOIN `highest_batch` `hb` ON ((`hb`.`id` = `btc`.`id`)))
                    LEFT JOIN `stock_warehouse_st` `st` ON ((`st`.`id` = `btc`.`st_id`)))
                    LEFT JOIN `coffee_seasons_csn` `csn` ON ((`csn`.`id` = `st`.`csn_id`)))
                    LEFT JOIN `grn_gr` `gr` ON ((`gr`.`id` = `st`.`grn_id`)))
                    LEFT JOIN `stock_location_sloc` `sloc` ON ((`sloc`.`id` = `hb`.`slocid`)))
                    LEFT JOIN `location_loc` `loc_row` ON ((`loc_row`.`id` = `sloc`.`loc_row_id`)))
                    LEFT JOIN `location_loc` `loc_column` ON ((`loc_column`.`id` = `sloc`.`loc_column_id`)))
                    LEFT JOIN `agent_agt` `agt` ON ((`agt`.`id` = `loc_column`.`agt_id`)))
                    LEFT JOIN `warehouse_wr` `wr` ON ((`wr`.`id` = `loc_column`.`agt_id`)))
                    LEFT JOIN `basket_bs` `bs` ON ((`bs`.`id` = `st`.`bs_id`)))
                    LEFT JOIN `packaging_pkg` `pkg` ON ((`pkg`.`id` = `st`.`pkg_id`)))
                    LEFT JOIN `material_mt` `mt` ON ((`mt`.`id` = `st`.`mt_id`)))
                    LEFT JOIN `instructed_stock_location_insloc` `insloc` ON ((`insloc`.`bt_id` = `btc`.`id`)))
                    LEFT JOIN `location_loc` `new_loc_row` ON ((`new_loc_row`.`id` = `insloc`.`loc_row_id`)))
                    LEFT JOIN `location_loc` `new_loc_column` ON ((`new_loc_column`.`id` = `insloc`.`loc_column_id`)))
                    LEFT JOIN `warehouse_wr` `new_wr` ON ((`new_wr`.`id` = `new_loc_column`.`agt_id`)))
                    LEFT JOIN `internal_basket_ibs` `ibs` ON ((`ibs`.`id` = `st`.`ibs_id`)))
                    LEFT JOIN `instructed_location_ref_ilf` `ilf` ON ((`ilf`.`id` = `insloc`.`ilf_id`)))
                    LEFT JOIN `movement_instruction_type_mit` `mit` ON ((`mit`.`id` = `ilf`.`mit_id`)))
                    LEFT JOIN `processing_results_type_prt` `prt` ON ((`prt`.`id` = `st`.`prts_id`)))
                    LEFT JOIN `dispatch_dp` `dp` ON ((`dp`.`id` = `st`.`dp_id`)))
                    LEFT JOIN `coffee_growers_cgr` `cgr` ON ((`cgr`.`id` = `st`.`cgr_id`)))
                    LEFT JOIN `process_results_prts` `prts` ON ((`prts`.`id` = `st`.`prts_id`)))
                WHERE
                    (ISNULL(`btc`.`btc_ended_by`)
                        AND (`st`.`id` IS NOT NULL)) AND ISNULL(`st`.`dp_id`)
                GROUP BY `st`.`id`
                ORDER BY `st`.`id`;

        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
