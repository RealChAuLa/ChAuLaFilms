<?php
$movieId = $_GET['Mid'];
if ($movieId) {
  include "config.php";
  $sql = "SELECT * FROM movietbl WHERE movie_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $movieId);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo '<div class="formbold-main-wrapper">
                        <div class="formbold-form-wrapper">
                            <form action="./php/updateWithoutIMG.php" method="POST" onsubmit="" enctype="multipart/form-data">
                                <div class="formbold-input-flex">
                                    <div>
                                        <label for="EmovieName" class="formbold-form-label">Name</label>
                                        <input type="text" name="EmovieName" id="EmovieName" placeholder="Movie Name" value = "' . $row["name"] . '" class="formbold-form-input" />
                                    </div>
                                    <div>
                                        <label for="EmovieYear" class="formbold-form-label">Year</label>
                                        <input type="text" name="EmovieYear" id="EmovieYear" placeholder="Released Year" value = "' . $row["year"] . '" class="formbold-form-input" />
                                    </div>
                                    <div>
                                        <label class="formbold-form-label">Genre</label>
                                        <select class="formbold-form-input" name="EmovieGenre" id="EmovieGenre">
                                            <option value = "' . $row["genre"] . '">' . $row["genre"] . '</option>
                                            <option value="Action">Action</option>
                                            <option value="Adventure">Adventure</option>
                                            <option value="Animation">Animation</option>
                                            <option value="Biography">Biography</option>
                                            <option value="Comedy">Comedy</option>
                                            <option value="Crime">Crime</option>
                                            <option value="Documentary">Documentary</option>
                                            <option value="Drama">Drama</option>
                                            <option value="Family">Family</option>
                                            <option value="Fantasy">Fantasy</option>
                                            <option value="Film-Noir">Film-Noir</option>
                                            <option value="Game-Show">Game-Show</option>
                                            <option value="History">History</option>
                                            <option value="Horror">Horror</option>
                                            <option value="Music">Music</option>
                                            <option value="Musical">Musical</option>
                                            <option value="Mystery">Mystery</option>
                                            <option value="News">News</option>
                                            <option value="Reality-TV">Reality-TV</option>
                                            <option value="Romance">Romance</option>
                                            <option value="Sci-Fi">Sci-Fi</option>
                                            <option value="Sport">Sport</option>
                                            <option value="Talk-Show">Talk-Show</option>
                                            <option value="Thriller">Thriller</option>
                                            <option value="War">War</option>
                                            <option value="Western">Western</option>
                                        </select>
                                    </div>
                                    <div class="formbold-mb-3">
                                        <label for="EmovieLink" class="formbold-form-label">Download Link</label>
                                        <input type="text" name="EmovieLink" id="EmovieLink" value = "' . $row["magnet"] . '" class="formbold-form-input" placeholder="Torrent Magnet Link" />
                                    </div>
                                </div>
                                <div class="formbold-mb-3">
                                    <label for="EmovieAbout" class="formbold-form-label">Description</label>
                                    <textarea rows="5" name="EmovieAbout" id="EmovieAbout" class="formbold-form-input" placeholder="About Movie">' . $row["description"] . '</textarea>
                                </div>
                                <div class="formbold-input-flex">
                                    <div class="formbold-form-file-flex">
                                        <label for="EmovieCover" class="formbold-form-label">
                                        Select New Cover
                                        </label>
                                        <input type="file"  name="EmovieCover" id="EmovieCover" class="formbold-form-file" />
                                    </div>
                                    <div class="formbold-form-file-flex">
                                        <label for="EmoviePoster" class="formbold-form-label">
                                            Select New Poster
                                        </label>
                                        <input type="file"  name="EmoviePoster" id="EmoviePoster" class="formbold-form-file" />
                                    </div>
                                    <div>
                                        <input type="text" style=";visibility: hidden;" name="EmovieId" id="EmovieId"  value = "' . $row["movie_id"] . '"/>
                                    </div>
                                </div>
                                <button class="formbold-btn" id="editBtn" type="submit" style="background-color:blue;">Edit</button>
                            </form>
                        </div>
                    </div>';
  } else {
    echo 'More Than One Movie Selected';
  }
} else {
  echo 'no pass value';
}

