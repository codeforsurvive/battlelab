<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mRabTransaction extends MY_Model {

    // constants, column definition
    const ID = 'RAB_ID';
    const STATUS_APPROVAL = 'RAB_STATUS_APPROVAL_ID';
    const ESTIMATOR = 'ESTIMATOR_ID';
    const VALIDATOR = 'VALIDATOR_ID';
    const PROJECT = 'PROJECT_ID';
    const PROJECT_STATUS = 'STATUS_PROJECT_ID';
    const RAB_NAME = 'RAB_NAMA';
    const RAB_CODE = 'RAB_KODE';
    const RAB_TOTAL = 'RAB_TOTAL';
    const RAB_OVERHEAD = 'RAB_AFTER_OVERHEAD';
    const RAB_ACTIVE = 'RAB_ACTIVE';
    const RAB_DATE = 'RAB_CREATE';
    const BUILDING_LIFETIME = 'ESTIMASI_UMUR_BANGUNAN';
    const WORKERS = 'ESTIMASI_JUMLAH_ORANG';
    const WHEATER_FACTOR = 'ESTIMASI_CUACA';
    const TOTAL_TIME = 'ESTIMASI_TOTAL_WAKTU';
    const TABLE = 'rab_transaction';

    public function __construct() {
        parent::__construct();
        $this->tableName = mRabTransaction::TABLE;
        $this->idField = mRabTransaction::ID;
    }

    public function getEstimationView($rabId = 0, $projectId = 0) {
        $rab = "";
        if ($rabId != 0) {
            $rab = " AND rt.RAB_ID = " . $rabId;
        }
        $project = "";
        if ($projectId != 0) {
            $project = " AND rt.PROJECT_ID = " . $projectId;
        }

        $sql = "SELECT
	rt.RAB_ID,
	rt.RAB_KODE,
	rt.RAB_NAMA,
	(
		SELECT
			p.PROJECT_NAMA
		FROM
			project p
		WHERE
			p.PROJECT_ID = rt.PROJECT_ID
	) PROJECT,
	(
		SELECT
			kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_NAMA
		FROM
			kategori_paket_pekerjaan
		WHERE
			kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_ID = d.KATEGORI_PEKERJAAN_ID
	) PEKERJAAN,
	rt.RAB_UPAH AS TOTAL_UPAH,
	(
		SELECT
			CASE
		WHEN (rt.ESTIMATOR_ID IS NOT NULL) THEN
			(
				SELECT
					pengguna.PENGGUNA_NAMA
				FROM
					pengguna
				WHERE
					pengguna.PENGGUNA_ID = rt.ESTIMATOR_ID 
			)
		ELSE
			'N\A'
		END
	) ESTIMATOR,
	(
		SELECT
			CASE
		WHEN (rt.VALIDATOR_ID IS NOT NULL) THEN
			(
				SELECT
					pengguna.PENGGUNA_NAMA
				FROM
					pengguna
				WHERE
					pengguna.PENGGUNA_ID = rt.VALIDATOR_ID
			)
		ELSE
			'N/A'
		END
	) VALIDATOR,
	(
		SELECT
			(UPAH_MINIMUM.UPAH * 0.1) + UPAH_MINIMUM.UPAH
		FROM
			(
				SELECT
					MIN(result.list_upah) AS UPAH
				FROM
					(
						SELECT
							mu.UPAH_HARGA AS list_upah
						FROM
							master_upah mu
						JOIN detail_analisa da ON mu.UPAH_ID = da.UPAH_ID AND mu.SATUAN_UPAH_ID = 1
					) AS result
			) UPAH_MINIMUM
	) KOEFISIEN_UPAH,
	(
		CASE
		WHEN (
			rt.ESTIMASI_TOTAL_WAKTU IS NOT NULL
		) THEN
			rt.ESTIMASI_TOTAL_WAKTU
		ELSE
			'N/A'
		END
	) TOTAL_WAKTU,
	(
		SELECT
			CASE
		WHEN (
			rt.RAB_STATUS_APPROVAL_ID IS NOT NULL
		) THEN
			(
				SELECT
					rab_status_approval.RAB_STATUS_APPROVAL_NAMA
				FROM
					rab_status_approval
				WHERE
					rab_status_approval.RAB_STATUS_APPROVAL_ID = rt.RAB_STATUS_APPROVAL_ID
			)
		ELSE
			'N/A'
		END
	) STATUS_APPROVAL,
	rt.ESTIMASI_JUMLAH_ORANG,
	rt.ESTIMASI_CUACA,
	rt.ESTIMASI_UMUR_BANGUNAN
FROM
	detail_pekerjaan d
JOIN rab_transaction rt ON d.RAB_ID = rt.RAB_ID,
 (
	SELECT
		r.RAB_ID
	FROM
		rab_transaction r
) rt2
WHERE
	rt.RAB_ID = rt2.RAB_ID" . $rab . $project .
                " GROUP BY
	(rt.RAB_ID)

";
        $columns = array(
            array('db' => 'RAB_KODE', 'dt' => 0),
            array( 'db' => 'RAB_NAMA',  'dt' => 1 ),
            array( 'db' => 'PROJECT',  'dt' => 2 ),
            array( 'db' => 'PEKERJAAN',  'dt' => 3 ),
            array( 'db' => 'TOTAL_UPAH',  'dt' => 4 ),
            array( 'db' => 'ESTIMATOR',  'dt' => 5 ),
            array( 'db' => 'VALIDATOR',  'dt' => 6 ),
            array( 'db' => 'TOTAL_WAKTU',  'dt' => 7 ),
            array( 'db' => 'STATUS_APPROVAL',  'dt' => 8 ),
            array( 'db' => 'ESTIMASI_JUMLAH_ORANG',  'dt' => 9 ),
            array( 'db' => 'ESTIMASI_CUACA',  'dt' => 10 ),
            array( 'db' => 'ESTIMASI_UMUR_BANGUNAN',  'dt' => 11 ),
            array( 'db' => 'RAB_ID',  'dt' => 12 )
        );
        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $sql));
    }

    public function estimationView($rabId = 0, $projectId = 0) {

        $rab = "";
        if ($rabId != 0) {
            $rab = " AND rt.RAB_ID = " . $rabId;
        }
        $project = "";
        if ($projectId != 0) {
            $project = " AND rt.PROJECT_ID = " . $projectId;
        }

        $sql = "SELECT
	rt.RAB_ID,
	rt.RAB_KODE,
	rt.RAB_NAMA,
	(
		SELECT
			p.PROJECT_NAMA
		FROM
			project p
		WHERE
			p.PROJECT_ID = rt.PROJECT_ID
	) PROJECT,
	(
		SELECT
			kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_NAMA
		FROM
			kategori_paket_pekerjaan
		WHERE
			kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_ID = d.KATEGORI_PEKERJAAN_ID
	) PEKERJAAN,
	rt.RAB_UPAH AS TOTAL_UPAH,
	(
		SELECT
			CASE
		WHEN (rt.ESTIMATOR_ID IS NOT NULL) THEN
			(
				SELECT
					pengguna.PENGGUNA_NAMA
				FROM
					pengguna
				WHERE
					pengguna.PENGGUNA_ID = rt.ESTIMATOR_ID 
			)
		ELSE
			'N\A'
		END
	) ESTIMATOR,
	(
		SELECT
			CASE
		WHEN (rt.VALIDATOR_ID IS NOT NULL) THEN
			(
				SELECT
					pengguna.PENGGUNA_NAMA
				FROM
					pengguna
				WHERE
					pengguna.PENGGUNA_ID = rt.VALIDATOR_ID
			)
		ELSE
			'N/A'
		END
	) VALIDATOR,
	(
		SELECT
			(UPAH_MINIMUM.UPAH * 0.1) + UPAH_MINIMUM.UPAH
		FROM
			(
				SELECT
					MIN(result.list_upah) AS UPAH
				FROM
					(
						SELECT
							mu.UPAH_HARGA AS list_upah
						FROM
							master_upah mu
						JOIN detail_analisa da ON mu.UPAH_ID = da.UPAH_ID AND mu.SATUAN_UPAH_ID = 1
					) AS result
			) UPAH_MINIMUM
	) KOEFISIEN_UPAH,
	(
		CASE
		WHEN (
			rt.ESTIMASI_TOTAL_WAKTU IS NOT NULL
		) THEN
			rt.ESTIMASI_TOTAL_WAKTU
		ELSE
			'N/A'
		END
	) TOTAL_WAKTU,
	(
		SELECT
			CASE
		WHEN (
			rt.RAB_STATUS_APPROVAL_ID IS NOT NULL
		) THEN
			(
				SELECT
					rab_status_approval.RAB_STATUS_APPROVAL_NAMA
				FROM
					rab_status_approval
				WHERE
					rab_status_approval.RAB_STATUS_APPROVAL_ID = rt.RAB_STATUS_APPROVAL_ID
			)
		ELSE
			'N/A'
		END
	) STATUS_APPROVAL,
	rt.ESTIMASI_JUMLAH_ORANG,
	rt.ESTIMASI_CUACA,
	rt.ESTIMASI_UMUR_BANGUNAN
FROM
	detail_pekerjaan d
JOIN rab_transaction rt ON d.RAB_ID = rt.RAB_ID,
 (
	SELECT
		r.RAB_ID
	FROM
		rab_transaction r
) rt2
WHERE
	rt.RAB_ID = rt2.RAB_ID" . $rab . $project .
                " GROUP BY
	(rt.RAB_ID);

";
        //print_r("sql: " . $sql);
        $query = $this->db->query($sql);
        $result = array();
        if (!$query) {
            $errNo = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            return null;
        } else if ($query->num_rows() > 0) {
            $it = 0;
            foreach ($query->result_array() as $row) {
                $result[$it++] = $row;
            }
        }
        //var_dump($result);
        return $result;
    }

}
