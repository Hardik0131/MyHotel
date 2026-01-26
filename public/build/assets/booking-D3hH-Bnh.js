$(document).ready(function(){function s(t,o){const e=t==="success"?"alert-success":"alert-warning";$(".booking-delete-alert").html(`
                    <div class="alert ${e}">
                        <div class="${e}-message">
                            <strong>${t==="success"?"Success!":"Error!"}</strong> ${o}
                        </div>
                        <button class="close"><i class="bx bx-x"></i></button>
                    </div>
                `).fadeIn(200)}$(document).on("click",".close i.bx-x",function(){$(this).closest(".alert").fadeOut(200)}),$(document).on("click",".booking-delete-btn",function(){let t=$(this).data("id"),o=$(this).closest("tr");confirm("Are you sure to delete this booking Item ?")&&$.ajax({url:"booking/delete/"+t,type:"DELETE",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},success:function(e){console.log("Bhaliya"),e.status==="success"?(o.fadeOut(400,function(){$(this).remove()}),s("success",e.message)):s("error",e.message)},error:function(){console.log("Hardik"),console.log(t),s("error","Something went wrong!")}})})});
