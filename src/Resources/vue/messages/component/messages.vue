<template>
<div class="app-email card">
  <div class="border-0">
    <div class="row g-0">
      <!-- Email Sidebar -->
      <div class="col app-email-sidebar border-end flex-grow-0" id="app-email-sidebar">
        <div class="btn-compost-wrapper d-grid">
          <button class="btn btn-primary btn-compose" @click="menuName = 'sendMsg';">
            ایجاد
          </button>
        </div>
        <!-- Email Filters -->
        <div class="email-filters py-2 ps ps__rtl">
          <!-- Email Filters: Folder -->
          <ul class="email-filter-folders list-unstyled mb-4">
            <li :class="(menuName == 'inbox') ? 'd-flex mb-2 active justify-content-between' : 'd-flex mb-2 justify-content-between'" data-target="inbox">
              <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center"  @click="menuName = 'inbox';getReciveMessagesList()">
                <i class="bx bx-envelope"></i>
                <span class="align-middle ms-2">صندوق ورودی</span>
              </a>
              <div class="badge bg-label-primary rounded-pill">{{countUnRead}}</div>
            </li>
            <li :class="(menuName == 'outbox') ? 'd-flex mb-2 active' : 'd-flex mb-2 '" data-target="sent">
              <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center"  @click="menuName = 'outbox';getSendMessagesList()">
                <i class="bx bx-paper-plane"></i>
                <span class="align-middle ms-2">ارسال شده</span>
              </a>
            </li>
            <li class="d-flex mb-2 align-items-center" data-target="trash">
              <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
                <i class="bx bx-trash"></i>
                <span class="align-middle ms-2">زباله دان</span>
              </a>
            </li>
          </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 246px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
      </div>
      <!--/ Email Sidebar -->

      <!-- Emails List -->
      <div class="col app-emails-list">
        <div class="card shadow-none border-0">
          <div class="card-body emails-list-header p-3 py-lg-3 py-2" v-show="menuName != 'sendMsg'">
            <!-- Email List: Search -->
            <div class="d-flex justify-content-between align-items-center mb-2 mb-lg-3" >
              <div class="d-flex align-items-center w-100">
                <i class="bx bx-menu bx-sm cursor-pointer d-block d-lg-none me-3" data-bs-toggle="sidebar" data-target="#app-email-sidebar" data-overlay=""></i>
                <div class="w-100">
                  <div class="input-group input-group-merge shadow-none">
                    <span class="input-group-text border-0 ps-0" id="email-search">
                      <i class="bx bx-search fs-4"></i>
                    </span>
                    <input type="text" class="form-control email-search-input border-0" placeholder="جستجوی ایمیل" aria-label="Search mail" aria-describedby="email-search">
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <i class="bx bx-rotate-left scaleX-n1-rtl cursor-pointer email-refresh me-2 bx-sm"></i>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="emailsActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded bx-sm"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="emailsActions">
                    <a class="dropdown-item" href="javascript:void(0)">علامت خوانده شده</a>
                    <a class="dropdown-item" href="javascript:void(0)">علامت خوانده نشده</a>
                    <a class="dropdown-item" href="javascript:void(0)">حذف</a>
                    <a class="dropdown-item" href="javascript:void(0)">بایگانی</a>
                  </div>
                </div>
              </div>
            </div>
            <hr class="mx-n3 emails-list-header-hr mb-2 mb-lg-3">
            <!-- Email List: Actions -->
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <div class="form-check me-2 mb-1">
                  <input class="form-check-input" type="checkbox" id="email-select-all">
                  <label class="form-check-label" for="email-select-all"></label>
                </div>
                <i class="bx bx-trash-alt email-list-delete cursor-pointer me-2"></i>
                <i class="bx bx-envelope-open email-list-read cursor-pointer me-2"></i>
                <div class="dropdown me-2">
                  <button class="btn p-0" type="button" id="dropdownMenuFolderTwo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-folder"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuFolderTwo">
                    <a class="dropdown-item" href="javascript:void(0)">
                      <i class="bx bx-error-circle bx-xs me-1"></i>
                      <span class="align-middle">اسپم</span>
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                      <i class="bx bx-pencil bx-xs me-1"></i>
                      <span class="align-middle">پیش‌نویس</span>
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                      <i class="bx bx-trash bx-xs me-1"></i>
                      <span class="align-middle">زباله دان</span>
                    </a>
                  </div>
                </div>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="dropdownLabelOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-purchase-tag"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLabelOne">
                    <a class="dropdown-item" href="javascript:void(0)">
                      <i class="badge badge-dot bg-success"></i>
                      <span class="align-middle">کارگاه</span>
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                      <i class="badge badge-dot bg-primary"></i>
                      <span class="align-middle">شرکت</span>
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                      <i class="badge badge-dot bg-info"></i>
                      <span class="align-middle">مهم</span>
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                      <i class="badge badge-dot bg-danger"></i>
                      <span class="align-middle">شخصی</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="email-pagination d-sm-flex d-none align-items-center flex-wrap justify-content-between justify-sm-content-end">
                <span class="d-sm-block d-none mx-3 text-muted">1-10 از 653</span>
                <i class="email-prev bx bx-chevron-left scaleX-n1-rtl cursor-pointer text-muted me-2 fs-4"></i>
                <i class="email-next bx bx-chevron-right scaleX-n1-rtl cursor-pointer fs-4"></i>
              </div>
            </div>
          </div>
          <hr class="container-m-nx m-0">
          <!-- Email List: Items -->
          <div class="email-list pt-0 ps ps__rtl" v-show="menuName === 'inbox'" >
            <ul class="list-unstyled m-0">
              <li  v-for="msg in reciveMessagesList" :class="(msg.updated_at != msg.created_at) ? 'email-list-item' : 'email-list-item email-marked-read'" @click="menuName = 'details';showMsg = msg;readAt(msg)">
                <div class="d-flex align-items-center">
                  <div class="form-check mb-1">
                    <input class="email-list-item-input form-check-input" type="checkbox" id="email-1">
                    <label class="form-check-label" for="email-1"></label>
                  </div>
                  <i class="email-list-item-bookmark bx bx-star d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                  <img src="http://192.168.1.113:8082/media/images/Users/Profile/noImage.png" alt="user-avatar" class="d-block flex-shrink-0 rounded-circle me-sm-3 me-0" height="32" width="32">
                  <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                    <span class="email-list-item-username me-2">{{msg.subject}}</span>
                    <span class="email-list-item-subject d-xl-inline-block d-block">
                      - {{msg.sender.name}} {{msg.sender.last_name}} - ({{msg.sender.username}})                    
                    </span>
                  </div>
                  <div class="email-list-item-meta ms-auto d-flex align-items-center">
                    <span class="email-list-item-label badge badge-dot bg-success d-none d-md-inline-block me-2" data-label="private"></span>
                    <small class="email-list-item-time text-muted" style="width: 110px !important;">{{convertDateToPersian(msg.created_at)}}</small>
                    <ul class="list-inline email-list-item-actions">
                      <li class="list-inline-item email-read"><i class="bx bx-envelope-open"></i></li>
                      <li class="list-inline-item email-delete"><i class="bx bx-trash"></i></li>
                      <li class="list-inline-item"><i class="bx bx-archive-in"></i></li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 1107px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 1107px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
          </div>
          <div class="email-list pt-0 ps ps__rtl" v-show="menuName === 'outbox'">
            <ul class="list-unstyled m-0">
              <li  v-for="msg in sendMessagesList" :class="(msg.updated_at != msg.created_at) ? 'email-list-item' : 'email-list-item email-marked-read'" @click="menuName = 'details';showMsg = msg">
                <div class="d-flex align-items-center">
                  <div class="form-check mb-1">
                    <input class="email-list-item-input form-check-input" type="checkbox" id="email-1">
                    <label class="form-check-label" for="email-1"></label>
                  </div>
                  <i class="email-list-item-bookmark bx bx-star d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                  <img src="http://192.168.1.113:8082/media/images/Users/Profile/noImage.png" alt="user-avatar" class="d-block flex-shrink-0 rounded-circle me-sm-3 me-0" height="32" width="32">
                  <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                    <span class="email-list-item-username me-2">{{msg.subject}}</span>
                    <span class="email-list-item-subject d-xl-inline-block d-block">
                      - {{msg.recipient.name}} {{msg.recipient.last_name}} - ({{msg.recipient.username}})                    
                    </span>
                  </div>
                  <div class="email-list-item-meta ms-auto d-flex align-items-center">
                    <span class="email-list-item-label badge badge-dot bg-success d-none d-md-inline-block me-2" data-label="private"></span>
                    <small class="email-list-item-time text-muted" style="width: 110px !important;">{{convertDateToPersian(msg.created_at)}}</small>
                    <ul class="list-inline email-list-item-actions">
                      <li class="list-inline-item email-read"><i class="bx bx-envelope-open"></i></li>
                      <li class="list-inline-item email-delete"><i class="bx bx-trash"></i></li>
                      <li class="list-inline-item"><i class="bx bx-archive-in"></i></li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 1107px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 1107px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
          </div>          
          <div class="email-list pt-0 ps ps__rtl" v-show="menuName === 'sendMsg'">
            <div class="row">
              <div class="col-sm-12">             
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="message-tab" data-bs-toggle="tab" data-bs-target="#message" type="button" role="tab" aria-controls="message" aria-selected="false">نوشتن پیام</button>
                  </li>            
                  <li class="nav-item" role="presentation">
                    <button class="nav-link " id="receiver-tab" data-bs-toggle="tab" data-bs-target="#receiver" type="button" role="tab" aria-controls="receiver" aria-selected="true">گیرنده</button>
                  </li>
                  <li class="nav-item" role="send">
                    <button class="nav-link " id="send-tab" data-bs-toggle="tab" data-bs-target="#send" type="button" role="tab" aria-controls="send" aria-selected="true" @click="setMsg()">بررسی و ارسال</button>
                  </li>              
                </ul>  
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade" id="receiver" role="tabpanel" aria-labelledby="receiver-tab">
                    <div class="row">
                      <div class="col-sm-10">
                        <label>گیرنده:</label>
                        <input class="form-control" placeholder="نام کاربری را وارد کنید" v-model="searchItem">                       
                      </div>
                      <div class="col-sm-2">
                        <button class="btn btn-primary" style="margin-top: 20px;" @click="searchUser()"><i class="fa fa-search"></i></button>
                      </div>
                      <div class="col-sm-8 mt-2">
                        <table class="table">
                          <tr v-for="user in searchResultsArray" :key="user.id">
                            <td>{{ user.username }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.last_name }}</td>
                            <td>
                              <button class="btn btn-primary btn-small" @click="addReceiver(user)" style="color:black"><i class="fa fa-plus"></i></button>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-sm-4 mt-2">
                        <ul>
                          <li v-for="(receiver, index) in receivers" :key="index" class="mt-2">
                            <button class="btn btn-danger btn-sm" @click="removeReceiver(index)"><i class="fa fa-close"></i></button>
                            {{ receiver.name }} {{ receiver.last_name }} - ({{ receiver.username }})
                          </li>
                        </ul>                       
                      </div>
                    </div>
                  </div> 
                  <div class="tab-pane fade  show active" id="message" role="tabpanel" aria-labelledby="message-tab">
                    <div class="row">
                      <div class="col-sm-12  mt-2">
                        <label>عنوان:</label>
                        <input class="form-control" title="عنوان نامه را وارد کنید" v-model="subject">
                      </div>
                      <div class="col-sm-12  mt-2">
                        <label>متن پیام:</label>
                        <textarea id="notetext" class="notetext" v-model="body"></textarea>
                      </div>
                      <div class="col-sm-12 mt-2">
                          <div class="form-group">
                            <label>پیوست: </label>
                            <input type="file" name="fields[assetsFieldHandle][]" id="assetsFieldHandle" ref="file" v-on:change="onChange" />
                          </div>
                      </div>                      
                    </div>
                  </div>   
                  <div class="send-tab fade" id="send" role="tabpanel" aria-labelledby="send-tab">
                    <h4>عنوان: {{subject}}</h4>
                    <div v-html="body"></div>
                    <button class="btn btn-primary" @click="sendMsg()"><i class="fa fa-paper-plane"></i> ارسال</button>
                  </div>                   
                </div> 
              </div> 

            </div>
          </div>
          <div v-show="menuName === 'details'" style="background-color: ghostwhite;">
            <br>
            <div class="card email-card-prev mx-sm-4 mx-3 border shadow-none" style="display: block;">
              <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex align-items-center mb-sm-0 mb-3">
                  <img src="http://192.168.1.113:8082/media/images/Users/Profile/noImage.png" alt="user-avatar" class="flex-shrink-0 rounded-circle me-3" height="40" width="40">
                  <div class="flex-grow-1 ms-1">
                    <h6 class="m-0">{{getSafe(()=>showMsg.sender.name)}} {{getSafe(()=>showMsg.sender.last_name)}}</h6>
                    <small class="text-muted">{{getSafe(()=>showMsg.sender.username)}}</small>
                  </div>
                </div>
                <div class="d-flex">
                  <p class="mb-0 me-3 text-muted">{{convertDateToPersian(showMsg.created_at)}}</p>
                  <i class="bx bx-paperclip cursor-pointer me-2 fs-4"></i>
                  <i class="email-list-item-bookmark bx bx-star cursor-pointer me-2 fs-4"></i>
                  <div class="dropdown me-3">
                    <button class="btn p-0" type="button" id="dropdownEmailOne" data-bs-toggle="dropdown" aria-haspopup="tru" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded fs-4 lh-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownEmailOne">
                      <a class="dropdown-item scroll-to-reply" href="javascript:void(0)">
                        <i class="bx bx-share me-1"></i>
                        <span class="align-middle">پاسخ</span>
                      </a>
                      <a class="dropdown-item" href="javascript:void(0)">
                        <i class="bx bx-share me-1 scaleX-n1 scaleX-n1-rtl"></i>
                        <span class="align-middle">فوروارد</span>
                      </a>
                      <a class="dropdown-item" href="javascript:void(0)">
                        <i class="bx bx-info-circle me-1"></i>
                        <span class="align-middle">گزارش</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h5>{{showMsg.subject}}</h5>
                <div v-html="showMsg.body"></div>
                <hr>
                <p class="email-attachment-title mb-2">پیوست‌ها</p>
                <a :href="getAppUrl()+'downloadMsgAttachment?id='+Attachment.id" class="cursor-pointer" v-for="Attachment in showMsg.attachments">
                  <i class="bx bx-file"></i>
                  <span class="align-middle ms-1">{{Attachment.file_name}}</span>
                </a>
              </div>
            </div>
          </div>          
        </div>
        <div class="app-overlay"></div>
      </div>  
      <!-- /Emails List -->
    </div>
  </div>
</div>
    <div class="card col-sm-12" style="margin-top: 12px;padding: 12px;" v-if="pagination1.last_page != 1">
      <nav aria-label="Page navigation">
        <ul class="pagination1">
        {{console.log(this.pagination1)}}
            <li v-if="pagination1.current_page > 1">
                <a href="#" aria-label="Previous" class="page-link" @click.prevent="changePage1(pagination1.current_page - 1)">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li v-for="page in pagesNumber1"
                :class="[ page == isActived1 ? 'page-item active' : '']">
                <a href="#" @click.prevent="changePage1(page)" class="page-link">{{ page }}</a>
            </li>
            <li v-if="pagination1.current_page < pagination1.last_page">
                <a href="#" aria-label="Next" class="page-link"
                    @click.prevent="changePage1(pagination1.current_page + 1)">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
      </nav>
  </div>

<div class="modal fade" id="searchUsers" tabindex="-1" aria-labelledby="searchUsersLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="searchUsersLabel">جستجو کاربر</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-10">
            <input class="form-control" v-model="searchUserStr" placeholder="نام کاربری را وارد کنید">
          </div>
          <div class="col-sm-2">
            <button class="btn btn-primary" @click="searchUser()"><i class="fa fa-search"></i></button>
          </div>
          <div class="col-sm-12"><br></div>
          <div class="col-sm-12">
            <table class="table">
              <tr>
                <th>نام کاربری</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>سمت</th>
                <th>گیرنده</th>
                <th>رونوشت</th>
              </tr>
              <tr v-for="item in users">
                <td>{{item.username}}</td>
                <td>{{item.name}}</td>
                <td>{{item.last_name}}</td>
                <td></td>
                <td>
                  <button class="btn btn-primary btn-small" 
                          style="color:black;" 
                          @click="
                            receiver_name= item.name + ' ' + item.last_name + ' - ' + receiver_name;
                            recipient_id = item.name + ' - ' + recipient_id
                          " 
                  >
                    <i class="fa fa-plus"></i>
                  </button>
                </td>
                <td>
                  <button class="btn btn-primary btn-small" 
                          style="color:black;" 
                          @click="
                            transcript_name= item.name + ' ' + item.last_name + ' - ' + transcript_name;
                            transcript_id = item.name + ' - ' + transcript_id
                          " 
                  >
                    <i class="fa fa-plus"></i>
                  </button>
                </td>                  
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>   
</template>

<style>
.editable {
  cursor: pointer;
}
</style>

<script>
import Swal from 'sweetalert2';
import moment from "jalali-moment";

export default {
  data() {
    return {
      menuName:'inbox',
      reciveMessagesList:[],
      sendMessagesList:[],
      receiver_name:'',
      receivers:[],
      transcripts:[],
      recipient_id:'',
      transcript_name:'',
      transcript_id:'',
      body:'',
      subject:'',
      date: '',
      pagination: {
          total: 0,
          per_page: 2,
          from: 1,
          to: 0,
          current_page: 1,
          last_page: 1
      },
      pagination1: {
          total: 0,
          per_page: 2,
          from: 1,
          to: 0,
          current_page: 1,
          last_page: 1
      },      
      offset:4,
      itemsPerPage:20,   
      searchQuery:'', 

      searchUserStr:'',
      searchResultsArray:[],
      searchItem:'',

      showMsg:[],
      filelist:[],
      countUnRead:0,
    };
  },
  components: {
  },  
  mounted() {
    this.getReciveMessagesList();
  },  
  methods: {
    readAt(msg)
    {
      if(msg.read_at == null)
      {
        axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
            const token = response.data.token;
            axios.request({
                method: 'PUT',
                url: this.getAppUrl() + 'api/messages?action=setReadMsgTime&id='+msg.id,
                headers: {'Authorization': `Bearer ${token}`}
            }).then(response => {
                this.getReciveMessagesList(); 
            }).catch(error => {
                this.checkError(error);
            });
        }).catch(error => {
            this.checkError(error);
        });         
      }
    },
    onChange() {
        this.filelist = [...this.$refs.file.files];
    },     
    convertDateToPersian(date){
      if(date)
        return moment(date, "YYYY-MM-DD HH:mm:ss").locale("fa").format("jYYYY/jMM/jDD HH:mm:ss");
      else
        return '';
    },    
    setMsg()
    {
      var editor = tinymce.get('notetext');
      if (editor) {
        var content = editor.getContent();
        this.body = content;
      }
    },
    sendMsg()
    {
      let formData = new FormData();
      formData.append('action', 'sendMsg');
      formData.append('_token', this.getToken());
      formData.append('receivers', JSON.stringify(this.receivers)); // Add receivers to FormData
      formData.append('subject', this.subject); // Add subject to FormData
      formData.append('body', this.body); // Add body to FormData

      for (let i = 0; i < this.filelist.length; i++) {
        let file = this.filelist[i];
        if ((file.size / 1024 / 1024) > 2) {
          this.pishgamanNotify('خطا', 'حجم فایل پیوستی مجاز نمی باشد', 'error');
          return false;
        }
        formData.append('file', file);
      }  

      axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
        const token = response.data.token;

        axios.post(this.getAppUrl() + 'api/messages', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
            'Authorization': `Bearer ${token}`
          }
        }).then(response => {
          Swal.fire('ثبت شد!', 'پیام با موفقیت ارسال شد', 'success');
          this.receivers = [];
          this.subject = "";
          this.body = "";
        }).catch(error => {
          this.checkError(error);
        }).finally(() => {
          this.isLoading = false;
        });
      }).catch(error => {
        this.checkError(error);
        this.isLoading = false;
      });
    },
    addReceiver(user) {
      // Check if the user already exists in the receivers array
      const userExists = this.receivers.some(receiver => receiver.id === user.id);
      if (!userExists) {
        this.receivers.push(user);
      }
    }, 
    removeReceiver(index) {
      this.receivers.splice(index, 1);
    },    
    addTranscript(user) {
      // Check if the user already exists in the transcripts array
      const userExists = this.transcripts.some(transcript => transcript.id === user.id);
      if (!userExists) {
        this.transcripts.push(user);
      }
    },  
    removeTranscript(index) {
      this.transcripts.splice(index, 1);
    },       
    searchUser()
    {
      axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
          const token = response.data.token;
          const searchUserStr = this.searchItem;
          axios.request({
              method: 'GET',
              url: this.getAppUrl() + 'api/messages?action=searchUser&username='+searchUserStr,
              headers: {'Authorization': `Bearer ${token}`}
          }).then(response => {
              this.searchResultsArray = response.data.Users; 
          }).catch(error => {
              this.checkError(error);
          });
      }).catch(error => {
          this.checkError(error);
      }); 
    },
    getReciveMessagesList(page=1){
      axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
          const token = response.data.token;
          axios.request({
              method: 'GET',
              url: this.getAppUrl() + 'api/messages?action=getReciveMessagesList&page='+page,
              headers: {'Authorization': `Bearer ${token}`}
          }).then(response => {
            this.countUnRead = response.data.countUnRead;
            this.reciveMessagesList = response.data.Messages.data; 
            this.fetchPagesDetails(response.data.Messages);
          }).catch(error => {
              this.checkError(error);
          });
      }).catch(error => {
          this.checkError(error);
      });            
    }, 
    getSendMessagesList(page=1){
      axios.get(this.getAppUrl() + 'sanctum/getToken').then(response => {
          const token = response.data.token;
          axios.request({
              method: 'GET',
              url: this.getAppUrl() + 'api/messages?action=getSendMessagesList&page='+page,
              headers: {'Authorization': `Bearer ${token}`}
          }).then(response => {
            this.sendMessagesList = response.data.Messages.data; 
            this.fetchPagesDetails1(response.data.Messages);
          }).catch(error => {
              this.checkError(error);
          });
      }).catch(error => {
          this.checkError(error);
      });            
    },  
    fetchPagesDetails1: function (page) {
      this.pagination1 = {
        total: page['total'],
        per_page: page['per_page'],
        from: page['from'],
        to: page['to'],
        current_page: page['current_page'],
        last_page: page['last_page'],
      };

    },         
    fetchPagesDetails: function (page) {
      this.pagination = {
        total: page['total'],
        per_page: page['per_page'],
        from: page['from'],
        to: page['to'],
        current_page: page['current_page'],
        last_page: page['last_page'],
      };

    },
    changePage: function (page) {
      this.getReciveMessagesList(page);
    },  
    changePage1: function (page) {
      this.getSendMessagesList(page);
    },      
  },
  computed: {
    isActived () {
      return this.pagination.current_page;
    },
    isActived1 () {
      return this.pagination1.current_page;
    },    
    pagesNumber () {
      if (!this.pagination.to) {
          return [];
      }
      let from = this.pagination.current_page - this.offset;
      if (from < 1) {
          from = 1;
      }
      let to = from + (this.offset * 2);
      if (to >= this.pagination.last_page) {
          to = this.pagination.last_page;
      }
      let pagesArray = [];
      while (from <= to) {
          pagesArray.push(from);
          from++;
      }
      return pagesArray;    
    },
    pagesNumber1 () {
      if (!this.pagination1.to) {
          return [];
      }
      let from = this.pagination1.current_page - this.offset;
      if (from < 1) {
          from = 1;
      }
      let to = from + (this.offset * 2);
      if (to >= this.pagination1.last_page) {
          to = this.pagination1.last_page;
      }
      let pagesArray = [];
      while (from <= to) {
          pagesArray.push(from);
          from++;
      }
      return pagesArray;    
    }    
  }
};
</script>
<style>
#mceu_37{display:none;}
</style>
