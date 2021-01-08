<div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="test.txt" method="post">
                    <div class="form-group">
                        <label for="reviewerEmail">Your email address</label>
                        <input type="email" class="form-control" id="reviewerEmail" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="ginRating">Rate the gin from 1-5</label>
                        <select class="form-control" id="ginRating">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ginReview">Leave a review of the gin<br><span class="small informational">Don't forget to suggest your perfect serve!</span></label>
                        <textarea class="form-control" id="ginReview" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ginPicture">Taken a picture of your gin?</label>
                        <input type="file" class="form-control-file" id="ginPicture">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-green" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-green"></input>
            </div>
        </div>
    </div>
</div>