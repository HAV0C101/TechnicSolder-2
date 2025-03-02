@extends('layouts/master')
@section('title')
  <title>Dashboard - Technic Solder</title>
@stop
@section('content')
  <div class="page-header">
    <h1>Solder Dashboard</h1>
    <p class="lead">Welcome to Technic Solder!</p>
  </div>
  @if (Session::has('permission'))
    <div class="alert alert-danger">
      {{ Session::get('permission') }}
    </div>
  @endif
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="recentModpacksHeading">
        <h3 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#recentModpacks" aria-expanded="true"
             aria-controls="recentModpacks">
            <i class="fa fa-refresh"></i> Recently Updated Modpacks
          </a>
        </h3>
      </div>
      <div id="recentModpacks" class="panel-collapse collapse in" role="tabpanel"
           aria-labelledby="recentModpacksHeading">
        <div class="panel-body">
          <table class="table table-striped table-bordered table-hover" id="dataTables">
            <thead>
            <tr>
              <th>#</th>
              <th>Build #</th>
              <th>Modpack</th>
              <th>MC Version</th>
              <th># of Mods</th>
              <th>Updated on</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($builds as $build)
              <tr>
                <td>{{ $build->id }}</td>
                <td>{{ $build->version }}</td>
                <td>{{ $build->modpack->name }}
                <td>{{ $build->minecraft }}</td>
                <td>{{ $build->modversions_count }}</td>
                <td>{{ $build->updated_at }}</td>
                <a href="{{'/modpack/build/'.$build->id}}" class="btn btn-warning btn-xs">Manage Build</a>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="recentModVersionsHeading">
        <h3 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#recentModVersions" aria-expanded="true"
             aria-controls="recentModVersions">
            <i class="fa fa-refresh"></i> Recently Added Mod Versions
          </a>
        </h3>
      </div>
      <div id="recentModVersions" class="panel-collapse collapse in" role="tabpanel"
           aria-labelledby="recentModVersionsHeading">
        <div class="panel-body">
          <table class="table table-striped table-bordered table-hover" id="dataTables">
            <thead>
            <tr>
              <th>#</th>
              <th>Version #</th>
              <th>Mod Name</th>
              <th>Author</th>
              <th>Website</th>
              <th>Created On</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($modversions as $modversion)
              <tr>
                <td><a href="{{'mod/view/'.$modversion->mod->id}}">{{$modversion->mod->id}}</a></td>
                <td>{{ $modversion->version }}</td>
                @if (!empty($modversion->mod->pretty_name))
                  <td><a href="{{'mod/view/'.$modversion->mod->id}}">{{$modversion->mod->pretty_name}}</a>
                    ({{ $modversion->mod->name }})
                  </td>
                @else
                  <td><a href="{{'mod/view/'.$modversion->mod->id}}">{{$modversion->mod->name}}</a></td>
                @endif
                <td>{{ !empty($modversion->mod->author) ? $modversion->mod->author : "N/A" }}</td>

                <td>{!! !empty($modversion->mod->link) ?  "<a target='_blank' href=".$modversion->mod->link.">".$modversion->mod->link."</a>" : "N/A" !!}</td>
                <td>{{ $modversion->created_at }}
                <td><a class="btn btn-xs btn-primary" href="{{'mod/view/'.$modversion->mod->id.'#versions'}}">Manage</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="changelogHeading">
        <h3 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#changelog" aria-expanded="true"
             aria-controls="changelog">
            <i class="fa fa-list"></i> Changelog
          </a>
        </h3>
      </div>
      <div id="changelog" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="changelogHeading">
        <div class="panel-body">
          <p><strong>Your Solder version is {{SOLDER_VERSION}}</strong></p>
          @if (array_key_exists('error',$changelog))
            <div class="alert alert-warning">{{ $changelog['error'] }}</div>
          @else
            <ul>
              @foreach ($changelog as $change)
                <li><code><a href="{{$change['html_url']}}">{{substr($change['sha'], 0, 7)}}</a></code> <span
                    style="margin-left:5px;margin-right:5px;"><i
                      class="fa fa-angle-double-left fa-1"></i></span> {{ $change['commit']['message'] }} </li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
    </div>
  </div>
  <p>TechnicSolder is an open source project. It is under the MIT license. Source Code: <a
      href="https://github.com/TechnicPack/TechnicSolder"
      target="_blank">https://github.com/TechnicPack/TechnicSolder</a></p>
@endsection
