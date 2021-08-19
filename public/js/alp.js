let data=()=>{
    return{
      inpt_typ:false,
      val:0,
      ann(){
        return this.val===30?true:false
      },
      exp(){
        return this.val===2?true:false
      },
      adde(val){
        val==1?this.val=30:this.val=2
        this.inpt_typ=true
      },
    }
  }