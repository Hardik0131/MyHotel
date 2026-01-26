$(document).ready(function(){function t(s,o){const e=s==="success"?"alert-success":"alert-warning";$(".rooms-delete-alert").html(`
                    <div class="alert ${e}">
                        <div class="${e}-message">
                            <strong>${s==="success"?"Success!":"Error!"}</strong> ${o}
                        </div>
                        <button class="close"><i class="bx bx-x"></i></button>
                    </div>
                `).fadeIn(200)}$(document).on("click",".close i.bx-x",function(){$(this).closest(".alert").fadeOut(200)}),$(document).on("click",".rooms-delete-btn",function(){let s=$(this).data("id"),o=$(this).closest("tr");confirm("Are you sure to delete this rooms Item ?")&&$.ajax({url:"room/delete/"+s,type:"DELETE",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},success:function(e){console.log("Bhaliya"),e.status==="success"?(o.fadeOut(400,function(){$(this).remove()}),t("success",e.message)):t("error",e.message)},error:function(){console.log("Hardik"),console.log(s),t("error","Something went wrong!")}})})});
