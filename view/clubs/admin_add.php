<div class="col-md-11 form-panel">
    <div class="row ">
        <form action=" <?php echo Router::url('admin/clubs/add/'.$id); ?>" method="POST" class="form-group" style="width: 90%;">
            <div class="custom-control custom-switch">
            <?php echo $this->Form->input('id','hidden');?>
            <?php echo $this->Form->input('name', 'Clubs name ?', array('class' =>'form-control')) ;?>
            <?php echo $this->Form->input('tag', 'tag name ?', array('class' =>'form-control '));?>
            <button id="subClub" value='send' type="submit" class="btn btn-primary sub">Submit</button>
            </div>
        </form>
    </div>
</div>
