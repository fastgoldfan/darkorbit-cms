<?php require_once(INCLUDES . 'header.php'); ?>

      <div id="main">
        <div class="container">
          <div class="row">
            <?php require_once(INCLUDES . 'data.php'); ?>

            <div class="col s12">
              <div id="profile" class="card white-text grey darken-4">
                <img src="/img/avatar.png">
                <div class="inline-right">
                  <h5><?php echo $player['shipName']; ?></h5>
                  <p>Clan: <?php echo ($player['userId'] == 0 ? 'Free Agent' : $mysqli->query('SELECT name FROM server_clans WHERE id = '.$player['clanId'].'')->fetch_assoc()['name']);?></p>
                  <p>Rank: <img src="<?php echo DOMAIN; ?>img/ranks/rank_<?php echo $player['rankID']; ?>.png"> <?php echo Functions::GetRankName($player['rankID']); ?></p>
                  <p>ID: <?php echo $player['userId']; ?></p>
                </div>
              </div>
            </div>

            <div class="col s12">
              <div id="hall-of-fame" class="card white-text grey darken-4 center">
                <h5 >HALL OF FAME</h5>
                <ul class="tabs grey darken-3 tabs-fixed-width tab-demo z-depth-1">
                  <li class="tab"><a href="#pilots">PILOTS</a></li>
                  <li class="tab"><a href="#clans">CLANS</a></li>
                </ul>
                <div id="pilots">
                  <table class="striped highlight">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Rank</th>
                        <th>Value</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($mysqli->query('SELECT * FROM player_accounts ORDER BY rankPoints LIMIT 10') as $value) { ?>
                      <tr>
                        <td><?php echo $value['shipName']; ?></td>
                        <td><img src="/img/companies/logo_<?php echo($value['factionId'] == 1 ? 'mmo' : ($value['factionId'] == 2 ? 'eic' : 'vru')); ?>_mini.png"></td>
                        <td><?php echo $value['rank']; ?></td>
                        <td><?php echo $value['rankPoints']; ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div id="clans">
                  <table class="striped highlight">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Rank</th>
                        <th>Value</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($mysqli->query('SELECT * FROM server_clans ORDER BY rank LIMIT 10') as $value) { ?>
                      <tr>
                        <td>[<?php echo $value['tag']; ?>] <?php echo $value['name']; ?></td>
                        <td><?php echo $value['rank']; ?></td>
                        <td><?php echo $value['rankPoints']; ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php require_once(INCLUDES . 'footer.php'); ?>
