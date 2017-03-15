from pollsAPI.models import Question, Choice
from pollsAPI.model.Video import Video
from pollsAPI.model.Categorie import Categorie
from pollsAPI.model.Commentaire import Commentaire
from pollsAPI.model.User import User
from pollsAPI.model.Vote import Vote
from pollsAPI.serializersAPI.CategorieSerializer import CategorieSerializer
from pollsAPI.serializersAPI.CommentaireSerializer import CommentaireSerializer
from pollsAPI.serializersAPI.QuestionSerializer import QuestionSerializer
from pollsAPI.serializersAPI.UserSerializer import UserSerializer
from pollsAPI.serializersAPI.ChoiceSerializer import ChoiceSerializer
from pollsAPI.serializersAPI.VideoSerializer import VideoSerializer
from pollsAPI.serializersAPI.VoteSerializer import VoteSerializer
from pollsAPI.permissions import IsOwnerOrReadOnly
from rest_framework import permissions, renderers, viewsets
from django.views.decorators.http import require_http_methods
from rest_framework.decorators import api_view, detail_route
from rest_framework.response import Response
from rest_framework.request import Request
from rest_framework.reverse import reverse
from rest_framework import status
import logging

logger = logging.getLogger(__name__)

@api_view(['GET','POST'])
def api_root(request, format=None):
    return Response({
        'users': reverse('user-list', request=request, format=format),
        'questions': reverse('question-list', request=request, format=format)
    })

class ChoiceViewSet(viewsets.ModelViewSet):
    queryset = Choice.objects.all()
    serializer_class = ChoiceSerializer
    @detail_route(renderer_classes=[renderers.StaticHTMLRenderer])
    def perform_create(self, serializer):
        serializer.save(question = Question.objects.get(pk=self.request.POST.get('question')))
    @detail_route(methods=['post'],url_name='update')
    def update_choice(self,serializer,pk):
        choice = Choice.objects.get(pk=pk)
        choice.choice_text = self.request.POST.get('choice_text')
        choice.votes = self.request.POST.get('votes')
        choice.question_id = Question.objects.get(pk=self.request.POST.get('question'))
        serializer = ChoiceSerializer(choice, self.request.data)
        serializer.is_valid()
        serializer.save()
        return Response(serializer.data)
    @detail_route(methods=['delete'],url_name='delete')
    def delete_choice(self,serializer,pk):
        choice = Choice.objects.get(pk=pk)
        choice.delete()

class QuestionViewSet(viewsets.ModelViewSet):
    queryset = Question.objects.all()
    serializer_class = QuestionSerializer
    permission_classes = (permissions.IsAuthenticatedOrReadOnly,
                          IsOwnerOrReadOnly,)

    @detail_route(renderer_classes=[renderers.StaticHTMLRenderer])
    def perform_create(self, serializer):
        serializer.save(owner=self.request.user)
    
class VideoViewSet(viewsets.ModelViewSet):
    queryset = Video.objects.all()
    serializer_class = VideoSerializer
    @detail_route(renderer_classes=[renderers.StaticHTMLRenderer])
    def perform_create(self, serializer):
        user = User.objects.get(pk=self.request.POST.get('user'))
        categorie = Categorie.objects.get(pk=self.request.POST.get('categorie'))
        serializer.save(user=user,categorie=categorie)
    @detail_route(methods=['post'],url_name='update')
    def update_video(self,serializer,pk):
        video = Video.objects.get(pk=pk)
        video.titre = self.request.POST.get('titre')
        video.lien = self.request.POST.get('lien')
        video.image = self.request.POST.get('image')
        video.dateDeCreation = self.request.POST.get('dateDeCreation')
        video.description = self.request.POST.get('description')
        categorie = Categorie.objects.get(pk=self.request.POST.get('categorie'))
        serializer = VideoSerializer(video, self.request.data)
        serializer.is_valid()
        serializer.save(categorie=categorie)
        return Response(serializer.data)
    @detail_route(methods=['delete'],url_name='delete')
    def delete_video(self,serializer,pk):
        try:
            video = Video.objects.get(pk=pk)
        except Video.DoesNotExist:
            return Response({'valid':False})
        video.delete()
        return Response({'valid':True})
        


class CommentaireViewSet(viewsets.ModelViewSet):
    queryset = Commentaire.objects.all()
    serializer_class = CommentaireSerializer
    @detail_route(renderer_classes=[renderers.StaticHTMLRenderer])
    def perform_create(self, serializer):
        user = User.objects.get(pk=self.request.POST.get('user'))
        video = Video.objects.get(pk=self.request.POST.get('video'))
        serializer.save(user=user,video=video)
    @detail_route(methods=['post'],url_name='update')
    def update_commentaire(self,serializer,pk):
        commentaire = Commentaire.objects.get(pk=pk)
        commentaire.message = self.request.POST.get('message')
        commentaire.dateDeCreation = self.request.POST.get('dateDeCreation')
        commentaire.user_id = User.objects.get(pk=self.request.POST.get('user'))
        commentaire.video_id = Video.objects.get(pk=self.request.POST.get('video'))
        serializer = CommentaireSerializer(commentaire, self.request.data)
        serializer.is_valid()
        serializer.save()
        return Response(serializer.data)
    @detail_route(methods=['delete'],url_name='delete')
    def delete_commentaire(self,serializer,pk):
        commentaire = Commentaire.objects.get(pk=pk)
        commentaire.delete()
       


class UserViewSet(viewsets.ModelViewSet):
    queryset = User.objects.all()
    serializer_class = UserSerializer
    @detail_route(renderer_classes=[renderers.StaticHTMLRenderer])
    def perform_create(self, serializer):
        serializer.save()
    @detail_route(methods=['post'],url_name='update')
    def update_user(self,serializer,pk):
        user = User.objects.get(pk=pk)
        user.pseudo = self.request.POST.get('pseudo')
        user.email = self.request.POST.get('email')
        user.motDePasse = self.request.POST.get('motDePasse')
        user.administrateur = self.request.POST.get('administrateur')
        user.dateDeCreation = self.request.POST.get('dateDeCreation')
        serializer = UserSerializer(user, self.request.data)
        serializer.is_valid()
        serializer.save()
        return Response(serializer.data)
    @detail_route(methods=['delete'],url_name='delete')
    def delete_user(self,serializer,pk):
        user = User.objects.get(pk=pk)
        user.delete()
    @detail_route(methods=['post'], url_name='exist-detail')
    def exist(self,request):
        if self.request.POST.get('pseudo'):
            try:
                queryset = User.objects.get(pseudo=self.request.POST.get('pseudo'))
            except User.DoesNotExist:
                return Response({'valid':False})
            if queryset:
                return Response({'valid':True})
            
        return Response({'valid':False})
    @detail_route(methods=['post'], url_name='connect')
    def connect(self,request):
        if(self.request.POST.get('pseudo') and self.request.POST.get('motDePasse')):
            try:
                user = User.objects.get(pseudo=self.request.POST.get('pseudo'), motDePasse = self.request.POST.get('motDePasse'))
                return Response({'valid':True, 'data':{'id':user.id,'pseudo':user.pseudo,'email':user.email,'motDePasse':user.motDePasse,'administrateur':user.administrateur,'dateDeCreation':user.dateDeCreation}})
            except User.DoesNotExist:
                return Response({'valid':False})
 
          
class VoteViewSet(viewsets.ModelViewSet):
    queryset = Vote.objects.all()
    serializer_class = VoteSerializer
    
    def create(self, serializer):
        user = User.objects.get(pk=self.request.POST.get('user'))
        video = Video.objects.get(pk=self.request.POST.get('video'))
        try:
            vote = Vote.objects.get(user=user,video=video)
        except Vote.DoesNotExist:
            vote = Vote()
            vote.dateDeCreation = self.request.POST.get('dateDeCreation')
            vote.user = User.objects.get(pk=self.request.POST.get('user'))
            vote.video = Video.objects.get(pk=self.request.POST.get('video'))
            serializer = VoteSerializer(vote,self.request.data)
            serializer.is_valid()
            serializer.save(user=user,video=video)
            return Response({'valid':True,'message':'added'})
        vote.delete()
        return Response({'valid':False,'message':"deleted"})
    
class CategorieViewSet(viewsets.ModelViewSet):
    queryset = Categorie.objects.all()
    serializer_class = CategorieSerializer
    @detail_route(renderer_classes=[renderers.StaticHTMLRenderer])
    def perform_create(self, serializer):
        serializer.save()
    @detail_route(methods=['post'],url_name='update')
    def update_categorie(self,serializer,pk):
        categorie = Categorie.objects.get(pk=pk)
        categorie.nom = self.request.POST.get('nom')
        serializer = CategorieSerializer(categorie, self.request.data)
        serializer.is_valid()
        serializer.save()
        return Response(serializer.data)
    @detail_route(methods=['delete'],url_name='delete')
    def delete_categorie(self,serializer,pk):
        categorie = Categorie.objects.get(pk=pk)
        categorie.delete()        
