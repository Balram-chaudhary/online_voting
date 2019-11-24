<?php
use App\Admin;
use Carbon\Carbon;
use App\Nominee;
use App\Vote;
class Helpers {

     public static function Votescorepresident($id){
     	
    $president=Vote::where('president','=',$id)->get();
    return $president;
  }

   public static function Votescorevicepresident($id){
          
    $vicepresident=Vote::where('vicepresident','=',$id)->get();
    return $vicepresident;
  }

 public static function Votescoregeneralsecretary($id){
          
    $generalsecretary=Vote::where('generalsecretary','=',$id)->get();
    return $generalsecretary;
  }
  public static function Votescoredeputygeneral($id){
          
    $deputygeneral=Vote::where('deputygeneral','=',$id)->get();
    return $deputygeneral;
  }
public static function Votescoretreasurer($id){
          
    $treasurer=Vote::where('treasurer','=',$id)->get();
    return $treasurer;
  }
  public static function Votescoremember($id){
          
    $member=Vote::where('member','=',$id)->get();
    return $member;
  }

}