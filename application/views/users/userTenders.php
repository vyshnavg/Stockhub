
<h2> <?= $title ?> </h2>

<div class="row" id="accordion">

    <div class="col-md-2">
    <div class="list-group" id="listInUserTender">
        <a href="#active" class="list-group-item active" data-toggle="collapse" data-parent="#accordion" >Active Tenders<span class="badge">0</span></a>
        <a href="#ongoing" class="list-group-item" data-toggle="collapse" data-parent="#accordion">Ongoing Tenders<span class="badge">0</span></a>
        <a href="#completed" class="list-group-item" data-toggle="collapse" data-parent="#accordion">Completed Tenders<span class="badge">0</span></a>
    </div>
    </div>


    <div class="col-md-10" >
        
        <div class="row collapse in" id="active">
            <div class="col-md-6">
                <div class="well well-lg">
                    Look, I'm in a large well!
                </div>
            </div>

            <div class="col-md-6">
                <div class="well well-lg">
                    Look, I'm in a large well!
                </div>
            </div>
        </div>


        <div class="row collapse" id="ongoing">
            <div class="col-md-6">
                <div class="well well-lg">
                    sadasdasdLook, I'm in a large well!
                </div>
            </div>

            <div class="col-md-6">
                <div class="well well-lg">
                    sadasdasdaLook, I'm in a large well!
                </div>
            </div>
        </div>


        <div class="row collapse" id="completed">
            <div class="col-md-6">
                <div class="well well-lg">
                    sadasdasdLook, I'm in a large well!
                </div>
            </div>

            <div class="col-md-6">
                <div class="well well-lg">
                    sadasdasdaLook, I'm in a large well!
                </div>
            </div>
        </div>


    </div>

</div>