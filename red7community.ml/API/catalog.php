<?php
/*
  File Name: catalog.php
  Original Location: /API/catalog.php
  Description: Catalog API to get details.
  Author: Mitchell (Creaous)
  Copyright (C) RED7 STUDIOS 2021
*/

include_once $_SERVER["DOCUMENT_ROOT"]. "/assets/config.php";

$response = array();

$api_type = $_GET['api'];

if (!empty($api_type)) {
	if ($api_type == 'getitembyid') {
		if (!empty($_GET['id'])) {
			$id = $_GET['id'];

			if ($link) {
				$sql = "SELECT * FROM catalog WHERE id=" . $id;
				$result = mysqli_query($link, $sql);

				if ($result) {
					header("Content-Type: JSON");
					$i = 0;

					if ($result->num_rows == 0 || $result->num_rows == null) {
						header("Content-Type: JSON");

						$response[0]['code'] = '3';
						$response[0]['result'] = "This item doesn't exist or has been deleted.";

						echo json_encode($response, JSON_PRETTY_PRINT);
					} else {
						while ($row = mysqli_fetch_assoc($result)) {
							$response[$i]['data'][0]['id'] = $row['id'];
							$response[$i]['data'][0]['name'] = $row['name'];
							$response[$i]['data'][0]['displayname'] = $row['displayname'];
							$response[$i]['data'][0]['description'] = $row['description'];
							$response[$i]['data'][0]['created'] = $row['created'];
							$response[$i]['data'][0]['membershipRequired'] = $row['membershipRequired'];
							$response[$i]['data'][0]['owners'] = $row['owners'];
							$response[$i]['data'][0]['price'] = $row['price'];
							$response[$i]['data'][0]['type'] = $row['type'];
							$response[$i]['data'][0]['icon'] = $row['icon'];
							$response[$i]['data'][0]['isLimited'] = $row['isLimited'];
							$response[$i]['data'][0]['copies'] = $row['copies'];
							$response[$i]['data'][0]['obj'] = $row['obj'];
							$response[$i]['data'][0]['mtl'] = $row['mtl'];
							$response[$i]['data'][0]['texture'] = $row['texture'];
							$response[$i]['data'][0]['creator'] = $row['creator'];
						}

						echo json_encode($response, JSON_PRETTY_PRINT);
					}
				}
			}
		}
	} else if ($api_type == 'getitembyname') {
		if (!empty($_GET['name'])) {
			$name = $_GET['name'];

			if ($link) {
				$sql = "SELECT * FROM catalog WHERE name='" . $name . "'";
				$result = mysqli_query($link, $sql);

				if ($result) {
					header("Content-Type: JSON");
					$i = 0;

					if ($result->num_rows == 0 || $result->num_rows == null) {
						header("Content-Type: JSON");

						$response[0]['code'] = '3';
						$response[0]['result'] = "This item doesn't exist or has been deleted.";

						echo json_encode($response, JSON_PRETTY_PRINT);
					} else {
						while ($row = mysqli_fetch_assoc($result)) {
							$response[$i]['data'][0]['id'] = $row['id'];
							$response[$i]['data'][0]['name'] = $row['name'];
							$response[$i]['data'][0]['displayname'] = $row['displayname'];
							$response[$i]['data'][0]['description'] = $row['description'];
							$response[$i]['data'][0]['created'] = $row['created'];
							$response[$i]['data'][0]['membershipRequired'] = $row['membershipRequired'];
							$response[$i]['data'][0]['owners'] = $row['owners'];
							$response[$i]['data'][0]['price'] = $row['price'];
							$response[$i]['data'][0]['type'] = $row['type'];
							$response[$i]['data'][0]['icon'] = $row['icon'];
							$response[$i]['data'][0]['isLimited'] = $row['isLimited'];
							$response[$i]['data'][0]['copies'] = $row['copies'];
							$response[$i]['data'][0]['obj'] = $row['obj'];
							$response[$i]['data'][0]['mtl'] = $row['mtl'];
							$response[$i]['data'][0]['texture'] = $row['texture'];
							$response[$i]['data'][0]['creator'] = $row['creator'];
						}

						echo json_encode($response, JSON_PRETTY_PRINT);
					}
				}
			}
		}
	} else if ($api_type == 'purchaseitembyname') {
		if (!empty($_GET['name'])) {
			$name = $_GET['name'];

			if ($link) {
				$sql = "SELECT * FROM catalog WHERE name='" . $name . "'";
				$result = mysqli_query($link, $sql);

				if ($result) {
					header("Content-Type: JSON");
					$i = 0;
					while ($row = mysqli_fetch_assoc($result)) {
						$response[$i]['data'][0]['id'] = $row['id'];
						$response[$i]['data'][0]['name'] = $row['name'];
						$response[$i]['data'][0]['description'] = $row['description'];
						$response[$i]['data'][0]['membershipRequired'] = $row['membershipRequired'];
						$response[$i]['data'][0]['owners'] = $row['owners'];
						$response[$i]['data'][0]['price'] = $row['price'];
						$response[$i]['data'][0]['type'] = $row['type'];
						$response[$i]['data'][0]['icon'] = $row['icon'];
					}

					echo json_encode($response, JSON_PRETTY_PRINT);
				}
			}
		}
	}
}
?>