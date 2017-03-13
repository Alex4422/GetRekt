from django.contrib import admin
#from GetRekt.pollsAPI.models import categorie, commentaire, user, video, vote
#from models.categorie import *

from pollsAPI.model.categorie import *
from pollsAPI.model.commentaire import *
from pollsAPI.model.user import *
from pollsAPI.model.video import *
from pollsAPI.model.vote import *


# Register your models here.

admin.site.register(categorie)
admin.site.register(commentaire)
admin.site.register(user)
admin.site.register(video)
admin.site.register(vote)