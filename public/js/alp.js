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

  let input=()=>{
    return{
      show:false,
      id:0,
      changeShow(id=0){
        if(this.id==id){
          this.show=!this.show
        }
        else{
          this.id=id
          this.show=true
        }
      },
      inputShow(id){
        return this.show&&this.id==id
      },
      initShow(){
        this.show=false
      }
    }
  }

  let modal=()=>{
    return {
      'showEModal': false ,
      user:0,
      change(id){
        this.user=id
        this.showEModal=true
      }
    }
  }
  
  let contrat=()=>{
    return{
      inpt_typ:false,
      contrat_type:0,
      CDD(){
        return this.contrat_type===1?true:false
      },
      CDI(){
        return this.contrat_type===2?true:false
      },
      display(val){
        this.contrat_type=val
        this.inpt_typ=true
      },
      isDisplay(){
        return this.inpt_typ&&this.contrat_type==1
      }
    }
  }
  